<?php
echo "<form class='d-inline-block align-top' name='search' method='get' action='list.php'>";
?>
        <div class="d-flex">
            <span class="flex-default">
                <?php
                echo "<input type='hidden' name='sort' value='{$sort}'>";
                if ($searchKeyword) {
                    echo "<input type='hidden' name='beforeSearch' value='{$searchKeyword}'>";
                }
                ?>
                <input class="form-control" type="text" name="searchKeyword" required>
            </span>
            <!--    <select name="option" id="" required>-->
            <!--        <option value="title">제목</option>-->
            <!--        <option value="content">내용</option>-->
            <!--        <option value="tandc">제목과 내용</option>-->
            <!--        <option value="torc">제목 또는 내용</option>-->
            <!--    </select>-->
            <button class="btn btn-dark flex-default white-space-nowrap" type="submit">검색</button>
        </div>
    </form>