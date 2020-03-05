<?php
  $gender = "woman";
  $likePlace = "Universal Studios";

  if($gender == "man"){
    echo "only woman.";
  }else switch($likePlace){
    case 'disneyland':
      // code...
      echo "디즈니랜드를 좋아합니다.";
      break;

    case 'disneysea':
      // code...
      echo "디즈니씨를 좋아합니다.";
      break;

    case 'Universal Studios':
      // code...
      echo "유니버셜 스튜디오를 좋아합니다.";
      break;

    default :
      echo "무엇도 좋아하지 않습니다.";
  }
 ?>
