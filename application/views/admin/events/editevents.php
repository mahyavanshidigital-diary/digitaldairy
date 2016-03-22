<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Event</h1>
                
                <?php 
                if(!empty($eventData[0]['event_images'])){
                
                $images = explode(",",$eventData[0]['event_images']);
                
                ?>
                <div class="row">
                <?php for($i=0;$i<count($images);$i++) { ?>    
                  <div class="col-md-4" id="eventimages_<?php echo $i ?>">
                    <div class="thumbnail" style="float:left;">
                      <img src="<?php echo base_url()  ?>admintemplate/eventimages/<?php echo $images[$i] ?>" alt="<?php echo $images[$i] ?>" style="width:150px;height:150px;">
                    </div>
                    <a href="javascript:void(0);" style="float:left;" onclick="delete_img('<?php echo $images[$i] ?>','eventimages_<?php echo $i ?>')"><i class="fa fa-times" style="color:red"></i></a>
                  </div>
                <?php } ?>
                </div>
                <?php } ?>
                
                <form role="form" id="add_events_form" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/event/editeventSave">
                    <div class="form-group" id="div_event_title">
                        <label class="control-label">Title</label>
                        <input type="text" id="event_title" name="event_title" class="form-control" value="<?php echo $eventData[0]['event_title'] ?>">
                    </div>
                    <div class="form-group" id="div_event_description">
                        <label class="control-label">Description</label>
                        <textarea type="text" id="event_description" name="event_description" class="form-control" rows="10"><?php echo $eventData[0]['event_description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Blog Image</label>
                        <input type="file" id="event_fileupload" name="event_fileupload[]" multiple>
                        <input type="hidden" name="hidden_event_file_remove" id="hidden_event_file_remove"  />
                        <input type="hidden" name="hidden_event_file_exists" id="hidden_event_file_exists" value="<?php echo $eventData[0]['event_images'] ?>" />
                        <input type="hidden" name="hidden_event_id" id="hidden_event_id" value="<?php echo $eventData[0]['event_id'] ?>"/>
                    </div>
                    <button class="btn btn-default" type="submit" name="submit">Submit Button</button>
                </form>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    
<!-- Modal -->
<div id="EventModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script>
    function delete_img(imgName,idtoHide) {
        var footer = "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" onclick=\"delete_image('"+imgName+"','"+idtoHide+"')\">Yes</button>";
        footer += '<button type="button" class="btn btn-default" data-dismiss="modal" >No</button>';
    
        $('#EventModel .modal-body').html('Are you sure want to delete ?');
        $('#EventModel .modal-footer').html(footer);
        $('#EventModel').modal('show', {backdrop: 'static'});
    }
    
    function delete_image(imgName,idtoHide) {
    
        jQuery("#"+idtoHide).hide();
        var hidden_event_file_remove = jQuery("#hidden_event_file_remove").val();
        
        if(hidden_event_file_remove == '')
            hidden_event_file_remove = imgName;
        else
            hidden_event_file_remove += ","+imgName;
        
        jQuery("#hidden_event_file_remove").val(hidden_event_file_remove);
    }
</script>