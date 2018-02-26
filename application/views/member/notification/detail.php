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
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>

                
                <li class="active">Netline Crew</li>
            </ul><!-- /.breadcrumb -->

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
								1 Pilot<br>
								2 Cabin Crew
							</h1>
						</div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">


                    <!--
                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                    </h4>
                -->

                <div class="row">
                    <div class="col-xs-12">

                        <div class="clearfix">

                            <?php echo $this->session->flashdata('msgbox') ?>
                        </div>
                        <div class="table-header">
                            Nearest Crew
                        </div>
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Occup</th>
										<th>Name</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Location</th>
                                        <th>Choose</th>
                                    </tr>
                                </thead> 
                                <tbody>
								<?php
                                 $no = 0 ;
                                 foreach($listData as $value){
                                    $no++;
									$status = '';
									$total_duty_time = $value->total_duty_time;
									if(empty($total_duty_time)){
										$total_duty_time = 0;
									}
									$total_rest_hour = $value->total_rest_hour;
									if(empty($total_rest_hour)){
										$total_rest_hour = 0;
									}
									if($value->status == 1){
										$status = "Onduty";
									}else if($value->status == 2){
										$status = "Reserved";
									}else if($value->status == 3){
										$status = "Standby";
									}else if($value->status == 4){
										$status = "Dayoff";
									}
                                 ?>
									<tr>
										<td><b><?php echo $no;?></b></td>
										<td><b>Cabin Crew</b></td>
										<td>
											<b><?php echo $value->name;?></b><br>
											Total Duty Time : <?php echo $total_duty_time; ?> Hour<br>
											Total Rest Hour : <?php echo $total_rest_hour; ?> Hour
										</td>
										<td><b><?php echo $value->gender;?></b></td>
										<td><b><?php echo $status; ?></b></td>
										<td><b><a target="_blank" href="https://www.google.co.id/maps/@<?php echo $value->location;?>,14z?hl=id"><?php echo $value->location;?></a></b></td>
										<td><input type="checkbox" name="choose[]" value="<?php echo $value->fa_id;?>"></td>
									</tr>
								 <?php } ?>
								</tbody>
                        </table> 
						 <!-- div.table-responsive -->
						 
                        <div class="modal-footer no-margin-top" > 
							<button type="button" class="btn btn-sm btn-success pull-right" data-dismiss="modal">
								<i class="ace-icon fa fa-check"></i>
								Choose
							</button>
                        </div>
                        <!-- div.dataTables_borderWrap -->
                    </div>

                </div><!-- /.modal-dialog -->
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
