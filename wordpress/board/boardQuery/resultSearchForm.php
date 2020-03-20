<?php
echo "<form name='search' method='post' action='resultSearchResult.php?sort={$sort}&beforeKeyword={$searchKeyword}'>";
?>
    <input type="text" name="searchKeyword">
    <select name="option" id="" required>
        <option value="title">제목</option>
        <option value="content">내용</option>
        <option value="tandc">제목과 내용</option>
        <option value="torc">제목 또는 내용</option>
    </select>
    <select name="resultSearch" id="" required>
        <option value="tsrch">전체검색</option>
        <option value="rsrch">결과 내 재검색</option>
    </select>
    <input type="submit" value="검색">
</form>