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
            ?>
            <input class="form-control" type="text" name="searchKeyword" required>
        </span>
        <button class="btn btn-dark flex-default white-space-nowrap" type="submit">검색</button>
    </div>
</form>