<?php 
function setPostLike($postID) {   
    $count_key = 'post_like_count';   
    $count = get_post_meta($postID, $count_key, true);   
    if($count==''){   
        $count = 0;   
        delete_post_meta($postID, $count_key);   
        add_post_meta($postID, $count_key, '0');   
    }else{   
        $count++;   
        update_post_meta($postID, $count_key, $count);   
    }   
}  

$likeid = $_GET['likeid'];
setPostLike($likeid);
echo "sucess";
?>
