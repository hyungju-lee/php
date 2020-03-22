<?php
echo "<form class='d-inline-block align-top' name='search' method='post' action='searchResult.php?sort={$sort}'>";
?>
        <input class="form-control d-inline-block w-auto align-top" type="text" name="searchKeyword">
        <!--    <select name="option" id="" required>-->
        <!--        <option value="title">제목</option>-->
        <!--        <option value="content">내용</option>-->
        <!--        <option value="tandc">제목과 내용</option>-->
        <!--        <option value="torc">제목 또는 내용</option>-->
        <!--    </select>-->
        <button class="btn btn-dark align-top" type="submit">검색</button>
    </form>