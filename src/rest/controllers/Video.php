<?php


use MODX\Revolution\Rest\modRestController;

class restControllerVideo extends modRestController
{
    public function get()
    {
        $params = $this->getProperties();
        $this->modx->addPackage('gallery', $this->modx->getOption('core_path') . 'components/gallery/model/');

        $id = isset($params['id']) ? (int)$params['id'] : 1;

        $queryItems = $this->modx->newQuery('galItem');
        if (!empty($id)) {
            $queryItems->where([
                "id" => $id,
            ]);
        }
        $items = $this->modx->getCollection('galItem', $queryItems);

        $queryTags = $this->modx->newQuery('galTag');
        if (!empty($id)) {
            $queryTags->where([
                "item" => $id,
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


        $currentId = $itemsArray[0]['id'];
        $itemTag = null;

        foreach ($tagsArray as $tag) {
            if ($tag['item'] == $currentId) {
                $itemTag = $tag['tag'];
                break;
            }
        }

        $objectArray[] = [
            "id" => $itemsArray[0]['id'],
            "name" => $itemsArray[0]['name'],
            "path" => "/assets/gallery/" . $itemsArray[0]['filename'],
            "description" => $itemsArray[0]['description'],
            "url" => $itemsArray[0]['url'],
            "tag" => $itemTag,
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