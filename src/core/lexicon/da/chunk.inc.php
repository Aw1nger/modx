<?php
/**
 * Chunk English lexicon topic
 *
 * @language en
 * @package modx
 * @subpackage lexicon
 */

// Entry out of alpha order because it must come before the entry it's used in below
$_lang['example_tag_chunk_name'] = 'NameOfChunk';

$_lang['chunk'] = 'Chunk';
$_lang['chunk_category_desc'] = 'Use to group Chunks within the Elements tree.';
$_lang['chunk_code'] = 'Chunk Code (HTML)';
$_lang['chunk_description_desc'] = 'Usage information for this Chunk shown in search results and as a tooltip in the Elements tree.';
$_lang['chunk_delete_confirm'] = 'Er du sikker på du vil slette denne chunk?';
$_lang['chunk_duplicate_confirm'] = 'Er du sikker på du vil kopiere denne chunk?';
$_lang['chunk_err_create'] = 'An error occurred while trying to create the chunk.';
$_lang['chunk_err_duplicate'] = 'Fejl under kopieringen af chunk.';
$_lang['chunk_err_ae'] = 'Der er allerede en chunk med navnet "[[+name]]".';
$_lang['chunk_err_invalid_name'] = 'Chunknavnet er ugyldigt.';
$_lang['chunk_err_locked'] = 'Chunk\'en er låst.';
$_lang['chunk_err_remove'] = 'An error occurred while trying to delete the chunk.';
$_lang['chunk_err_save'] = 'Der opstod en fejl blokken mens chunk\'en blev gemt.';
$_lang['chunk_err_nf'] = 'Chunk ikke fundet!';
$_lang['chunk_err_nfs'] = 'Chunk med id: [[+id]] ikke fundet';
$_lang['chunk_err_ns'] = 'Chunk ikke angivet.';
$_lang['chunk_err_ns_name'] = 'Angiv et navn.';
$_lang['chunk_lock'] = 'Lås chunk for redigering';
$_lang['chunk_lock_desc'] = 'Only users with “edit_locked” permissions can edit this Chunk.';
$_lang['chunk_name_desc'] = 'Place the content generated by this Chunk in a Resource, Template, or other Chunk using the following MODX tag: [[+tag]]';
$_lang['chunk_new'] = 'Create Chunk';
$_lang['chunk_properties'] = 'Standardegenskaber';
$_lang['chunk_tab_general_desc'] = 'Here you can enter the basic attributes for this <em>Chunk</em> as well as its content. The content must be HTML, either placed in the <em>Chunk Code</em> field below or in a static external file, and may include MODX tags. Note, however, that PHP code will not run in this element.';
$_lang['chunk_tag_copied'] = 'Chunk tag copied!';
$_lang['chunks'] = 'Chunks';

// Temporarily match old keys to new ones to ensure compatibility
// --fields
$_lang['chunk_desc_category'] = $_lang['chunk_category_desc'];
$_lang['chunk_desc_description'] = $_lang['chunk_description_desc'];
$_lang['chunk_desc_name'] = $_lang['chunk_name_desc'];
$_lang['chunk_lock_msg'] = $_lang['chunk_lock_desc'];

// --tabs
$_lang['chunk_msg'] = $_lang['chunk_tab_general_desc'];