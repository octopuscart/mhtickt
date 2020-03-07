<?php
$this->load->view('layout/header');
?>
<style>
    .time-select--wide {
        margin-top: -3px;
        margin-bottom: 15px;
    }
    .time-select .time-select__group {
        position: relative;
        overflow: hidden;
        margin-bottom: 2px;
        background-color: #f5f5f5;
    }
    .time-select .time-select__place {
        font-size: 16px;
        margin-top: 21px;
        margin-left: 5px;
        margin-bottom: 23px;
    }
    .time-select .items-wrap {
        padding-top: 15px;
        margin-bottom: 5px;
    }
    .time-select .time-select__group:after {
        content: '';
        width: 2px;
        height: 25px;
        background-color: #fff;
        position: absolute;
        left: 31%;
        bottom: 0;
    }
    .time-select--wide .time-select__group:before, .time-select--wide .time-select__group:after {
        left: 23%;
    }
    .time-select .time-select__item {
        position: relative;
        z-index: 0;
        display: inline-block;
        font-size: 12px;
        padding: 9px 15px 8px 14px;
        margin: 5px 16px 5px 0;
        cursor: pointer;
        background-image: url(<?php echo base_url(); ?>assets/movies/bg-time.png);
        background-size: 100%;
        border: 2px solid #fff;
    }
    .time-select .time-select__item:after {
        content: '';
        width: 64px;
        height: 34px;

        background-repeat: no-repeat;
        -webkit-background-size: 64px 34px;
        background-size: 64px 34px;
        top: 0px;
        left: -2px;
        z-index: -1;
    }
    .time-select .time-select__item:before {
        content: '';
        width: 54px;
        height: 28px;
        position: absolute;
        top: 3px;
        left: 3px;

    }
    .time-select .time-select__item:hover {
        background-color: #000000;
        border: 2px solid #000;
    }
</style>

<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="   ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1><?php echo($movie['title']); ?> </h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Select Show Time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<!-- Single Blog Page Area Start Here -->


<div class="portfolio2-page-area1" style="padding: 30px">
    <div class="container">

        <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
            <div class="product-box2" style="height: 250px;background: #f5f5f5;
                 color: white;
                ">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive" style="width: 174px;" src="<?php echo base_url(); ?>assets/movies/<?php echo $movie['image']; ?>" alt="product">
                    </a>
                    <div class="media-body">
                        <div class="product-box2-content">
                            <h3><a href="#"><?php echo $movie['title']; ?></a></h3>
                            <span><?php echo $movie['attr']; ?></span>
                            <p><?php echo $movie['about']; ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

<hr/>

                <div class="choose-container choose-container--short">
                    <h2 class="page-heading">Select Date</h2>
                    <div class="offer-area1 hidden-after-desk movieblockhome" style="padding:10px;">
                        <div id="countdown2" style="position: inherit;    text-align: left;">
                            <div class="countdown-section"><h3>7th</h3> <p>MARCH</p> </div>
                            <div class="countdown-section"><h3>8th</h3> <p>MARCH</p> </div>
                            <div class="countdown-section"><h3>9th</h3> <p>MARCH</p> </div>

                        </div>
                    </div>
                </div>
<hr/>
                <h2 class="page-heading">Select time</h2>

                <div class="time-select time-select--wide">

                    <?php
                    foreach ($theaters as $key => $value) {
                        ?>    

                        <div class="time-select__group group--first">
                            <div class="col-sm-3">
                                <p class="time-select__place"><?php echo $value['title']; ?></p>
                            </div>
                            <ul class="col-sm-6 items-wrap">
                                <?php
                                foreach ($value['timing'] as $key2 => $value2) {
                                    ?>
                                    <li class="time-select__item" data-time="<?php echo $value2; ?>"><?php echo $value2; ?></li>
                                        <?php
                                    }
                                    ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>


            </div>

        </div>
    </div>
</div>



<?php
$this->load->view('layout/footer');
?>