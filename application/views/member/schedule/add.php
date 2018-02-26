<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>
 
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/schedule/daftar') ?>">Schedule</a>
                </li>
                
                
                <li class="active">Tambah Schedule</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <!-- #section:settings.skins -->
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <!-- /section:settings.skins -->

                        <!-- #section:settings.navbar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <!-- /section:settings.navbar -->

                        <!-- #section:settings.sidebar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <!-- /section:settings.sidebar -->

                        <!-- #section:settings.breadcrumbs -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <!-- /section:settings.breadcrumbs -->

                        <!-- #section:settings.rtl -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <!-- /section:settings.rtl -->

                        <!-- #section:settings.container -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>

                        <!-- /section:settings.container -->
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <!-- #section:basics/sidebar.options -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>

                        <!-- /section:basics/sidebar.options -->
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Form Tambah Schedule
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/schedule/doAdd'?>" role="form"> 
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
						<div class="form-group">        
                          <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                            Harap isi isian di bawah ini:
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Date</label>
                            <div class="col-sm-9">
                                <input type="date" id="form-field-1" name="date" value="" placeholder="Fill Flight Attendant's Name" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Take Off Time</label>
                            <div class="col-sm-9">
                                <input type="time" id="form-field-1" name="take_off_time" value="" placeholder="Fill Flight Attendant's Name" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Landing Time</label>
                            <div class="col-sm-9">
                                <input type="time" id="form-field-1" name="landing_time" value="" placeholder="Fill Flight Attendant's Name" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Flight Code</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="flight_code" value="" placeholder="Fill Flight Code" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Origin Code</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="origin_code" value="" placeholder="Fill Origin Code" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                           <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Destination Code</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="destination_code" value="" placeholder="Fill Destination Code" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pilot</label>
                            <div class="col-sm-9">
                                <select class="col-xs-10 col-sm-5" name="pilot">
									<?php foreach($list_pilot as $value){?>
									<option value="<?php echo $value->pilot_id?>"><?php echo $value->name?></option>
									<?php }?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">CO Pilot</label>
                            <div class="col-sm-9">
                                <select class="col-xs-10 col-sm-5" name="co_pilot">
									<?php foreach($list_pilot as $value){?>
									<option value="<?php echo $value->pilot_id?>"><?php echo $value->name?></option>
									<?php }?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                           <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Aircraft</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="aircraft" value="" placeholder="Fill Aircraft Code" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						<strong>TRANSPORTATION</strong>
						<hr>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Driver</label>
                            <div class="col-sm-9">
                                <select id="form-field-1" name="driver" class="col-xs-10 col-sm-5" required/>
									<?php foreach($list_driver as $value){?>
									<option value="<?php echo $value->driver_id?>"><?php echo $value->name?></option>
									<?php }?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pickup Time</label>
                            <div class="col-sm-9">
                                <input type="time" id="form-field-1" name="pickup_time" value="" placeholder="" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Arrived Time</label>
                            <div class="col-sm-9">
                                <input type="time" id="form-field-1" name="arrived_time" value="" placeholder="" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Vehicle</label>
                            <div class="col-sm-9">
                                <select id="form-field-1" name="vehicle" class="col-xs-10 col-sm-5" required/>
									<?php foreach($dataVehicle as $value){?>
									<option value="<?php echo $value->vehicle_id?>"><?php echo $value->vehicle_id?></option>
									<?php }?>
								</select>
                            </div>
                        </div>
						
						<strong>CREW / FLIGHT ATTENDANT</strong>
						<hr>
						<div class="form-group">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                       
										<th>Occup</th>
                                        <th>Name</th>
										<th>Gender</th>
										<th>Status</th>
										<th>Location</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead> 
                                <tbody>
									<!--
									<?php
										foreach($list_pilot as $pilot){
									?>
                                    <tr>
										<td>Pilot</td>
                                        <td><?php 
												echo "<strong>".$pilot->name ."</strong>"."<br>";
												echo "Total Flight Time : ".$pilot->total_flight_time ."<br>";
										?></td>
										<td><?php echo $pilot->gender; ?></td>
										<?php 
											if($pilot->status == 1){
												$status = "Dayoff"; //belum dipilih
											}else if($pilot->status == 2){
												$status = "Reserved"; //dipilih
											}else if($pilot->status == 3){
												$status = "Standby"; //approve schedule
											}else if($pilot->status == 4){
												$status = "Onduty"; //checkin
											}
										?>
										<td><?php echo $status; ?></td>
										
                                        <td><?php echo $pilot->location; ?></td>
                                        <td>
                                            <input type="checkbox" name="pilot[]"  value="<?php echo $pilot->pilot_id?>">Choose
                                        </td>
									</tr>	
									<?php } ?>
									-->
									 
									<?php
										
										foreach($list_fa as $value){
									?>
									<tr>
										<td>Cabin Crew</td>
                                        <td><?php 
												echo "<strong>".$value->name ."</strong>"."<br>";
												echo "Total Duty Time : ".$value->total_duty_time ."<br>";
												echo "Total Rest Time : ".$value->total_rest_hour ."<br>";
											?>
										</td>
										<td><?php echo $value->gender; ?></td>
										<?php 
											if($value->status == 1){
												$status = "Dayoff";
											}else if($value->status == 2){
												$status = "Standby";
											}else if($value->status == 3){
												$status = "Reserved";
											}else if($value->status == 4){
												$status = "Onduty";
											}
										?>
										<td><?php echo $status; ?></td>
                                        <td><?php echo $value->location; ?></td>
                                        <td>
                                            <input type="checkbox" name="fa[]"  value="<?php echo $value->fa_id?>">Choose
                                        </td>
                                    </tr>
                                    <?php }?>   
                            </tbody>
                        </table> 
                    </div>
						
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <!--
								<button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Simpan
                                </button>
								-->
								<button class="btn  btn-info"  type="submit" onclick="return confirm('Are you sure?')"><i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                
								
								
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                    </form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->