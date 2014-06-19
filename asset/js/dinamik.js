			$(document).ready(function(){
            $("#cloneTableRows").live('click', function(){
                // id tabel
                 var thisTableId = $(this).parents("table").attr("id");
 
                // baris terakhir terakhir
                var lastRow = $('#'+thisTableId + " tr:last");
 
                // kloning baris terakhir
                var newRow = lastRow.clone(true);
 
                // tambah baris
                $('#'+thisTableId).append(newRow);
 
                // aksi untuk hapus
                $('#'+thisTableId + " tr:last td:first .delRow").css("visibility", "visible");
 
                // clear input baris (Optional)
                $('#'+thisTableId + " tr:last td:input").val('');
                 
                
                return false;
            });
 

            // Hapus baris
            $(".delRow").click(function(){
                $(this).parents("tr").remove();
                return false;
            });
            
            $.ajaxSetup(
            {  
                cache: false,    
                beforeSend: function() {
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
            },
            success: function() {
                $('#loading').hide();
            }
                }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
            
            setInterval(function() {
            //$('#results').load('transaksi.php');
            $('#tampil_sms').load(''); 
            }, 5000);
        });

        document.write('<style type="text/css">.tabber{display:none;}</style>');
