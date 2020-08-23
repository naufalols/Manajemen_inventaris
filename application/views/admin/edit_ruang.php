<br><br><br><br>
<div id="maincontent" class="ui main container">
    <h1 class="ui header"><?= $title; ?></h1>
    <?= $this->session->flashdata('notice'); ?>
    <div class="ui stackable grid">
        <div class="nine wide column">
            <div id="regInnkommende" class="ui stacked segment">
                <a class="ui blue ribbon label">Edit Ruang</a>
                <div class="ui form">
                    <form action="<?= base_url('admin/simpan_edit_ruangan') ?>" method="POST">
                        <div class="two fields">
                            <div class="field">
                                <label>Nomor Ruang</label>
                                <div class="ui input">
                                    <input type="hidden" name="id_ruang" value="<?= $ruangan['id_ruang'] ?>">
                                    <input name="nomor_ruang" value="<?= $ruangan['nomor_ruang'] ?>" type="text" placeholder="Nomor Ruang" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Nama Ruang</label>
                                <div class="ui input">
                                    <input name="nama_ruang" value="<?= $ruangan['nama_ruang'] ?>" type="text" placeholder="Nama Ruang" required>
                                </div>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field">
                                <label>Luas Ruang</label>
                                <div class="ui input">
                                    <input name="luas" value="<?= $ruangan['luas_ruang'] ?>" type="text" placeholder="7,2 x 10,5 m²" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>lantai</label>
                                <div class="ui input">
                                    <select class="lokasi" name="lantai_ruang" required>
                                        <?php foreach ($lantai as $row) : ?>
                                            <option value="<?= $row['id_lantai'] ?>" <?php if ($row['id_lantai'] == $ruangan['id_lantai']) print "selected"; ?>>
                                                <?= $row['nama_lantai'] ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label>Penanggung Jawab</label>
                                <div class="ui input">
                                    <input type="text" name="pj_ruang" id="" value="<?= $ruangan['pj_ruang'] ?>" placeholder="Penanggung Jawab" required>
                                </div>
                            </div>
                        </div>
                        <button class="ui blue small button" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    window.onload = function(e) {
        var lokasi = $(".lokasi").val();
        getlokasi(lokasi);
    }

    function pilihlokasi(obj) {
        var lokasi = $(obj).val();
        getlokasi(lokasi);
    }

    function getlokasi(id) {
        // console.log(id);
        // return false;
        $.get("<?php echo base_url('Admin/getlokasi') ?>", {
            id: id
        }, function(e) {
            var json = $.parseJSON(e);
            // console.log(json);
            var txthtml = "";
            for (let index = 0; index < json.length; index++) {
                // const element = json[index];
                // console.log(element);
                txthtml += "<option value='" + json[index].nomor_ruang + "'>" + json[index].nomor_ruang + " " + json[index].nama_ruang + "</option>";
            }
            // console.log(txthtml);
            var inject = $("select.ruang");
            inject.empty();
            inject.html(txthtml);
        });
    }
</script>