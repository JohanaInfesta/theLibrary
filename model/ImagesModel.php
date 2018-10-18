<?php
class ImagesModel extends Model
{
    function getImages($id_book){
        $sentence = $this->db->prepare( "SELECT image.* FROM image WHERE image.id_book = ?");
        $sentence->execute([$id_book]);
        return $sentence->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteImage($id_image){
        $sentence = $this->db->prepare( "DELETE FROM image WHERE id_image = ?");
        $sentence->execute([$id_image]);
    }
}

?>