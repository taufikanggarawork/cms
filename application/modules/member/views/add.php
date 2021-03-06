<div class="content-wrapper">
    <section class="content-header">
      <h1 class="pull-left"><?php echo $subtitle; ?></h1>
      <div class="pull-right">
        <a href="<?php echo site_url('member'); ?>" class="btn bg-purple btn-sm" data-placement="left" data-toggle="tooltip" data-original-title="Kembali"><i class="fa fa-mail-reply"></i></a>
      </div>
    </section>

    <section class="content">
    	<div class="row">
			<div class="col-md-12">
			  	<div class="box box-primary">
                    <div class="box-header with-border">
                        <p class="box-title">Personal Data</p>
                    </div>
			    	<form class="form-horizontal" method="post" id="" action="<?php echo site_url('member/save'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
			    			<div class="form-group">
                                <label class="control-label col-sm-2">Nama Depan &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_fname" id="dmember_fname" value="<?php echo set_value('dmember_fname'); ?>" autofocus>
                                    <?php echo form_error('dmember_fname'); ?>
                                </div>
                                <label class="control-label col-sm-2">Nama Belakang &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_lname" id="dmember_lname" value="<?php echo set_value('dmember_lname'); ?>">
                                    <?php echo form_error('dmember_lname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tempat Lahir &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_pob" id="dmember_pob" value="<?php echo set_value('dmember_pob'); ?>">
                                    <?php echo form_error('dmember_pob'); ?>
                                </div>
                                <label class="control-label col-sm-2">Tanggal Lahir &nbsp<span class="required">*</span></label>
                                <div class="col-md-3">
                                    <input class="form-control" type="date" name="dmember_dob" id="dmember_dob" value="<?php echo set_value('dmember_dob'); ?>">
                                    <?php echo form_error('dmember_dob'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Status &nbsp<span class="required">*</span></label>
                                <div class="col-md-5">
                                    <select class="form-control" name="dmember_martialstat">
                                    	<option disabled selected>-- Pilih Status --</option>
                                        <option value="Menikah" <?php echo set_select('dmember_martialstat', 'Menikah'); ?>>Menikah</option>
                                        <option value="Belum Menikah" <?php echo set_select('dmember_martialstat', 'Belum Menikah'); ?>>Belum Menikah</option>
                                    </select>
                                    <?php echo form_error('dmember_martialstat'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Agama &nbsp<span class="required">*</span></label>
                                <div class="col-md-5">
                                    <select class="form-control" name="dmember_religion">
                                        <option disabled selected>-- Pilih Agama --</option>
                                        <option value="Muslim" <?php echo set_select('dmember_religion', 'Muslim'); ?>>Muslim</option>
                                        <option value="Kristen" <?php echo set_select('dmember_religion', 'Kristen'); ?>>Kristen</option>
                                        <option value="Katolik" <?php echo set_select('dmember_religion', 'Katolik'); ?>>Katolik</option>
                                        <option value="Hindu" <?php echo set_select('dmember_religion', 'Hindu'); ?>>Hindu</option>
                                        <option value="Budha" <?php echo set_select('dmember_religion', 'Budha'); ?>>Budha</option>
                                        <option value="Lainnya" <?php echo set_select('dmember_religion', 'Lainnya'); ?>>Lainnya</option>
                                    </select>
                                    <?php echo form_error('dmember_religion'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Pekerjaan &nbsp<span class="required">*</span></label>
                                <div class="col-md-5">
                                    <select class="form-control" name="dmember_occupation">
                                        <option disabled selected>-- Pilih Pekerjaan --</option>
                                        <option value="Karyawan Negeri" <?php echo set_select('dmember_occupation', 'Karyawan Negeri'); ?>>Karyawan Negeri</option>
                                        <option value="Karyawan Swasta" <?php echo set_select('dmember_occupation', 'Karyawan Swasta'); ?>>Karyawan Swasta</option>
                                        <option value="Entrepreneur" <?php echo set_select('dmember_occupation', 'Entrepreneur'); ?>>Entrepreneur</option>
                                        <option value="Freelance" <?php echo set_select('dmember_occupation', 'Freelance'); ?>>Freelance</option>
                                        <option value="Pelajar/Mahasiswa-i" <?php echo set_select('dmember_occupation', 'Pelajar/Mahasiswa-i'); ?>>Pelajar/Mahasiswa-i</option>
                                        <option value="Lainnya" <?php echo set_select('dmember_occupation', 'Lainnya'); ?>>Lainnya</option>
                                    </select>
                                    <?php echo form_error('dmember_occupation'); ?>
                                </div>
                            </div>
                            <br>
                            <h4 class="box-title">Data Alamat 1</h4>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Alamat &nbsp<span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="dmember_address1" id="dmember_address1" value="<?php echo set_value('dmember_address1'); ?>">
                                    <?php echo form_error('dmember_address1'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kecamatan &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_district1" id="dmember_district1" value="<?php echo set_value('dmember_district1'); ?>">
                                    <?php echo form_error('dmember_district1'); ?>
                                </div>
                                <label class="control-label col-sm-2">Kota &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_city1" id="dmember_city1" value="<?php echo set_value('dmember_city1'); ?>">
                                    <?php echo form_error('dmember_city1'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Propinsi &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_prov1" id="dmember_prov1" value="<?php echo set_value('dmember_prov1'); ?>">
                                    <?php echo form_error('dmember_prov1'); ?>
                                </div>
                                <label class="control-label col-sm-2">Kode Pos &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_postalcode1" id="dmember_postalcode1" value="<?php echo set_value('dmember_postalcode1'); ?>">
                                    <?php echo form_error('dmember_postalcode1'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nomor Telp. &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_phone1" id="dmember_phone1" value="<?php echo set_value('dmember_phone1'); ?>">
                                    <?php echo form_error('dmember_phone1'); ?>
                                </div>
                            </div>
                            <br>
                            <h4 class="box-title">Data Alamat 2</h4>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Alamat &nbsp<span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="dmember_address2" id="dmember_address2" value="<?php echo set_value('dmember_address2'); ?>">
                                    <?php echo form_error('dmember_address2'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kecamatan &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_district2" id="dmember_district2" value="<?php echo set_value('dmember_district2'); ?>">
                                    <?php echo form_error('dmember_district2'); ?>
                                </div>
                                <label class="control-label col-sm-2">Kota &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_city2" id="dmember_city2" value="<?php echo set_value('dmember_city2'); ?>">
                                    <?php echo form_error('dmember_city2'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Propinsi &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_prov2" id="dmember_prov2" value="<?php echo set_value('dmember_prov2'); ?>">
                                    <?php echo form_error('dmember_prov2'); ?>
                                </div>
                                <label class="control-label col-sm-2">Kode Pos &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_postalcode2" id="dmember_postalcode2" value="<?php echo set_value('dmember_postalcode2'); ?>">
                                    <?php echo form_error('dmember_postalcode2'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nomor Telp. &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="dmember_phone2" id="dmember_phone2" value="<?php echo set_value('dmember_phone2'); ?>">
                                    <?php echo form_error('dmember_phone2'); ?>
                                </div>
                            </div>
                            <br>
                            <h4 class="box-title">Data Tambahan</h4>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-sm-2">E-mail &nbsp<span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input class="form-control" name="member_email" id="member_email" value="<?php echo set_value('member_email'); ?>">
                                    <?php echo form_error('member_email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Unggah Foto &nbsp<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" name="foto" accept="image/*">
                                    <div class="text-danger"><?php echo $error; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Bio &nbsp<span class="required">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="dmember_bio" id="dmember_bio" value="<?php echo set_value('dmember_bio'); ?>"></textarea>
                                    <?php echo form_error('dmember_bio'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Status Member &nbsp<span class="required">*</span></label>
                                <div class="col-md-3">
                                    <select class="form-control" name="member_status">
                                        <option disabled selected>-- Pilih Status --</option>
                                        <option value="0" <?php echo set_select('member_status', '0'); ?>>Aktif</option>
                                        <option value="1" <?php echo set_select('member_status', '1'); ?>>Tidak Aktif</option>
                                    </select>
                                    <?php echo form_error('member_status'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
				    	</div>
			    	</form>
				</div>
			</div>
		</div>
    </section>
  </div>

