<?php
echo "<form class='d-inline-block align-top' name='search' method='get' action='{$route}/list.php'>";
?>
    <div class="d-flex">
        <span class="flex-default">
            <?php
            echo "<input type='hidden' name='sort' value='{$sort}'>";
            if ($searchKeyword) {
                echo "<input type='hidden' name='beforeSearch' value='{$searchKeyword}'>";
            }
            if ($sort) {
                echo "<input class='form-control' type='text' name='searchKeyword' required placeholder='{$sort}'>";
            } else {
                echo "<input class='form-control' type='text' name='searchKeyword' required placeholder='전체검색'>";
            }
            ?>
        </span>
        <button class="btn btn-dark flex-default white-space-nowrap" type="submit">검색</button>
    </div>
</form>