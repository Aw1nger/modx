<?php


use MODX\Revolution\Rest\modRestController;

class restControllerVideos extends modRestController
{
    public function get()
    {
        $params = $this->getProperties();
        $this->modx->addPackage('gallery', $this->modx->getOption('core_path') . 'components/gallery/model/');

        $album = isset($params['album']) ? (int)$params['album'] : 1;
        $page = isset($params['page']) ? (int)$params['page'] : 1;
        $limit = isset($params['limit']) ? (int)$params['limit'] : 5;
        $rand = isset($params['rand']) ? (int)$params['rand'] : 0;


        $queryAlbums = $this->modx->newQuery('galAlbumItem');
        $queryAlbums->where([
            'album' => $album, // Условие: только альбом с нужным айди
        ]);
        $albums = $this->modx->getCollection('galAlbumItem', $queryAlbums);

        $ids = [];
        foreach ($albums as $album) {
            $ids[] = $album->get('id');
        }

        $queryItems = $this->modx->newQuery('galItem');
        if (!empty($ids)) {
            $queryItems->where([
                "id:IN" => $ids,
            ]);
        }
        if ($rand === 1) {
            $queryItems->sortby('RAND()', '');
        }
        $items = $this->modx->getCollection('galItem', $queryItems);

        $queryTags = $this->modx->newQuery('galTag');
        if (!empty($ids)) {
            $queryTags->where([
                "item:IN" => $ids,
            ]);
        }
        $tags = $this->modx->getCollection('galTag', $queryTags);

        $tagsArray = [];
        foreach ($tags as $tag) {
            $tagsArray[] = $tag->toArray();
        }

        $itemsArray = [];
        foreach ($items as $item) {
            $itemsArray[] = $item->toArray();
        }

        $totalPages = ceil(count($itemsArray) / $limit);

        $objectArray = [];
        $startIndex = ($page - 1) * $limit;
        $endIndex = min($startIndex + $limit, count($itemsArray));

        for ($i = $startIndex; $i < $endIndex; $i++) {
            if (isset($itemsArray[$i])) {
                $currentId = $itemsArray[$i]['id'];
                $itemTag = null;

                foreach ($tagsArray as $tag) {
                    if ($tag['item'] == $currentId) {
                        $itemTag = $tag['tag'];
                        break;
                    }
                }

                $objectArray[] = [
                    "id" => $itemsArray[$i]['id'],
                    "name" => $itemsArray[$i]['name'],
                    "path" => "/assets/gallery/" . $itemsArray[$i]['filename'],
                    "description" => $itemsArray[$i]['description'],
                    "url" => $itemsArray[$i]['url'],
                    "tag" => $itemTag,
                ];
            }
        }

        $objectArray = [
            "items" => $objectArray,
            "total_page" => $totalPages,
        ];

        return $this->success("", $objectArray);
    }

    public function post()
    {
        return $this->failure('Метод не разрешен');
    }

    public function put()
    {
        return $this->failure('Метод не разрешен');
    }

    public function delete()
    {
        return $this->failure('Метод не разрешен');
    }
}