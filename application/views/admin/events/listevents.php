<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Event</h1>
                    <?php if($this->session->flashdata('event_message')) echo $this->session->flashdata('event_message'); ?>    
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table width="100%" id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SR NO</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 500px;">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th>
                                                <th tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(count($events_list) > 0) {
                                            for($i=0;$i<count($events_list);$i++) { ?>
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1"><?php echo $i+1 ?></td>
                                                <td><?php echo $events_list[$i]['event_title'] ?></td>
                                                <td><?php echo $events_list[$i]['created_event'] ?></td>
                                                <td class="center">
                                                    <a href="<?php echo base_url() ?>admin/event/editevent/<?php echo $events_list[$i]['event_id'] ?>"><i class="fa fa-edit"></i>
                                                        <i class="fa fa-times" style="color:red"></i>
                                                </td>
                                            </tr>
                                            <?php } } else { ?>
                                            <tr class="gradeA odd" role="row">
                                                <td colspan="4">No Records</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /.table-responsive -->
                        </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>