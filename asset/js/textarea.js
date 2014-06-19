<script type="text/javascript">
              var rowNum = <?php echo $row->ID;?>;
              // This selector is called every time a select box is changed
              $(document).ready(function() {
    //var rowNum =$(this).attr(rowNum1);
                $("#modal_popup").change(function(){
                    var data_id = $(this).attr('data-id');
    // varible to hold string
    //var str = $("#isi_jenis_balasan option:selected").text();
    // when the select box is changed, we add the value text to the varible
    // then display it in the following class
              $('textarea').text(data_id);
            }).change();
          });
    </script>  