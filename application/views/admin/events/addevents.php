<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Event</h1>
                
                <form role="form" id="add_events_form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/event/insertEvent">
                    <div class="form-group" id="div_event_title">
                        <label class="control-label">Title</label>
                        <input type="text" id="event_title" name="event_title" class="form-control">
                    </div>
                    <div class="form-group" id="div_event_description">
                        <label class="control-label">Description</label>
                        <textarea type="text" id="event_description" name="event_description" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Blog Image</label>
                        <input type="file" id="event_fileupload" name="event_fileupload[]" multiple>
                    </div>
                    <button class="btn btn-default" type="submit" name="submit">Submit Button</button>
                </form>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->