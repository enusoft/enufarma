<title><?= $title ?></title>
<script type="text/javascript">
function load_data_abc(awal, akhir, jenis) {
    $.ajax({
        url: '<?= base_url('laporan/load_data_abc') ?>',
        data: 'awal='+awal+'&akhir='+akhir+'&jenis='+jenis,
        cache: false,
        success: function(data) {
            $('#result').html(data);
        }
    });
}
$(function() {
    $('#tabs').tabs();
    $('#tampil').button({
        icons: {
            secondary: 'ui-icon-search'
        }
    }).click(function() {
        var awal = $('#awal').val();
        var akhir= $('#akhir').val();
        var jenis= $('input:checked').val();
        load_data_abc(awal,akhir,jenis);
    });
    $('#cancel').button({
        icons: {
            secondary: 'ui-icon-refresh'
        }
    }).click(function() {
        $('#loaddata').load('<?= base_url('laporan/abc') ?>');
    });
    $('#awal,#akhir').datepicker({
        changeYear: true,
        changeMonth: true
    });
});
</script>
<div class="titling"><h1><?= $title ?></h1></div>
<div class="kegiatan">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Parameter</a></li>
        </ul>
        <div id="tabs-1">
            <table width="100%" class="inputan">
                <tr><td>Range Tanggal:</td><td><?= form_input('awal', date("d/m/Y"), 'id=awal size=10') ?> s.d <?= form_input('akhir', date("d/m/Y"), 'id=akhir size=10') ?><?= form_hidden('jenis', 'Penjualan') ?></td></tr>
                <tr><td></td><td><?= form_button(NULL, 'Tampilkan', 'id=tampil') ?> <?= form_button(NULL, 'Reset', 'id=cancel') ?></td></tr>
            </table>
            <div id="result"></div>
        </div>
    </div>
</div>