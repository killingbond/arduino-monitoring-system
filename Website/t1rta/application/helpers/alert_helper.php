<?php
/**
 * Created by PhpStorm.
 * User: jokopurnomoa
 * Date: 9/9/15
 * Time: 10:41 AM
 */

function alert_success_add($message){
    if(isset($_GET['sa'])){
        ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message?>
        </div>
    <?php
    }
}

function alert_failed_add($message){
    if(isset($_GET['fa'])){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message?>
        </div>
    <?php
    }
}

function alert_success_update($message){
    if(isset($_GET['su'])){
        ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message?>
        </div>
    <?php
    }
}

function alert_failed_update($message){
    if(isset($_GET['fu'])){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message?>
        </div>
    <?php
    }
}

function alert_success_delete($message){
    if(isset($_GET['sd'])){
        ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message?>
        </div>
    <?php
    }
}

function alert_failed_delete($message){
    if(isset($_GET['fd'])){
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message?>
        </div>
    <?php
    }
}