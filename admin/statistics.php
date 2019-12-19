<?php
/**  */
?>

<div class="statistic">
    <span>Date start: </span>
    <?= date('d-m-Y H:i:s', $currentDate) ?>

    <form method="post">
        <input hidden name="updatetime" value="true">
        <button type="submit">Update Date</button>
    </form>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="all-visit">
                    <span>All visit: </span>
                    <?= $numberOfVisit ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="all-visit">
                    <span>Unique visit: </span>
                    <?= $numberOfUniqueVisit ?>
                </div>
            </div>
            <div class="col-sm-4">
                 <div class="all-visit">
                    <span>active user by day</span> </br>
                    <span>His ip:  <?= $velue ?> </span> </br>
                    <span>His count:  <?= $activeUser ?></span></br>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="all-visit">
                    <span>active user by date in DB</span> </br>
                    <span>His ip:  <?= $velueForDate ?> </span> </br>
                    <span>His count:  <?= $activeUserForDBDate ?></span></br>
                </div>
            </div>
        </div>
    </div>


</div>


