<div class="container">
    <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><strong>Event</strong></h2>
                    <hr>
                </div>
                <?php 
                foreach($eventList as $eventEach) {
                ?>
                <div class="col-md-12">
                    <h1 class="page-header"><?php echo $eventEach['event_title']; ?></h1>
                    <p><?php echo str_replace('/n','<br/>',$eventEach['event_title']); ?></p>
                </div>
                <div class="clearfix"></div>
                <?php } ?>
            </div>
    </div>
</div>