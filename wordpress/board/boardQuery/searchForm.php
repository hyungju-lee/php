<?php
echo "<form name='search' method='post' action='searchResult.php?sort={$sort}'>";
?>
    <input type="text" name="searchKeyword">
<!--    <select name="option" id="" required>-->
<!--        <option value="title">제목</option>-->
<!--        <option value="content">내용</option>-->
<!--        <option value="tandc">제목과 내용</option>-->
<!--        <option value="torc">제목 또는 내용</option>-->
<!--    </select>-->
    <input type="submit" value="검색">
</form>