 <div class="container">

       <div class="row">
          <div class="box">
                <div class="personal_profile_wrapper">
                    <div class="col-md-8 no-padding m-b-30">
                        <div class="personal_profile_top">
                            <div class="personal_profile_thumb text-center">
                                <?php if(!empty($profile['profile_picture'])) { ?>
                                    <img src="<?php echo base_url('uploads/profile/'.$profile['profile_picture']); ?>" class="img-circle">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/profile/blankAvatar.jpg'); ?>" class="img-circle">
                                <?php } ?>
                                <h4><?php echo $profile['first_name'].' '.$profile['middle_name'].' '.$profile['last_name'];?></h4>
                            </div>
                        </div>
                      
                        <div class="personal_profile_bottom">
                            <div class="col-md-6">
                                <div class="personal_profile_full">
                                    <?php if(!empty($profile['profile_picture'])) { ?>
                                    <img src="<?php echo base_url('uploads/profile/'.$profile['profile_picture']); ?>" class="img-responsive">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/profile/blankAvatar.jpg'); ?>" class="img-responsive">
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Personal Details</h3>
                                <div class="personal_profile_details">

                                    <span class="about-user-left">Full Name:</span>
                                    <span class="about-user-right"><?php echo $profile['first_name'].' '.$profile['middle_name'].' '.$profile['last_name']; ?></span>
                                    <span class="about-user-left">Marital Status :</span>
                                    <span class="about-user-right"><?php echo $profile['marital']; ?></span>
                                    <span class="about-user-left">Occupation: </span>
                                    <span class="about-user-right"><?php echo $profile['occupation']; ?></span>
                                    <span class="about-user-left">Education :</span>
                                    <span class="about-user-right"><?php echo $profile['gender']; ?></span>
                                    <span class="about-user-left">Gender :</span>
                                    <span class="about-user-right"><?php echo $profile['gender']; ?></span>
                                    <span class="about-user-left">Address:</span>
                                    <span class="about-user-right"><?php echo $profile['per_housenumber'].' '.$profile['per_society'].' '.$profile['per_area'].' '.$profile['per_pincode'];?></span>
                                    <span class="about-user-left">City:</span>
                                    <span class="about-user-right"><?php echo $profile['per_city']; ?></span>
                                    <span class="about-user-left">State:</span>
                                    <span class="about-user-right"><?php echo $profile['per_state']; ?></span>
                                    <span class="about-user-left">District:</span>
                                    <span class="about-user-right"><?php echo $profile['per_district']; ?></span>
                                    <span class="about-user-left">Taluka:</span>
                                    <span class="about-user-right"><?php echo $profile['per_taluka']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 no-padding">                        
                        <div class="user_search_info">
                            <p>Family Members</p>
                        </div>
                        <div class="row">
                            <?php foreach($members as $member) { ?>
                                <?php 
                                    if(!empty($parent) && ($member['id']==$profile['id'])) {
                                        ?>
                                        <div class="col-xs-6 col-md-3">
                                        <a href="<?php echo base_url('user/profile/'.$parent['id']); ?>" class="thumbnail">
                                          <img src="<?php echo base_url('uploads/profile/'.$parent['profile_picture']); ?>" alt="">
                                        </a>
                                      </div>
                            <?php
                                       continue;
                                    }
                                ?>
                          <div class="col-xs-6 col-md-3">
                            <a href="<?php echo base_url('user/profile/'.$member['id']); ?>" class="thumbnail">
                              <img src="<?php echo base_url('uploads/profile/'.$member['profile_picture']); ?>" alt="">
                            </a>
                          </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if(!$parent) { ?>
                    <div class="col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Family Information
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                      <table>
                                          <thead>
                                          <th>Name</th>
                                          <th>Relation</th>
                                          <th>Education</th>
                                          <th>Occupation</th>
                                          </thead>
                                          <tbody>
                                              <?php foreach($members as $member) { ?>
                                              <tr>
                                                <td><?php echo $member['first_name'].' '.$member['middle_name'].' '.$member['last_name']; ?></td>
                                                <td><?php echo $member['relation']; ?></td>
                                                <td><?php echo $member['education']; ?></td>
                                                <td><?php echo $member['occupation']; ?></td>
                                              </tr>
                                                <?php } ?>
                                          </tbody>
                                      </table>
                                  </div>
                                </div>
                              </div>
                            </div>

                    </div>
                    <?php } ?>
                </div>
          </div>
        </div>
    </div>

    <!-- /.container -->