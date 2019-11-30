$(function() {
    $('.tampilModal').on('click', function() {
        const id = $(this).data('id');
        

        $.ajax({
            url: 'http://localhost/TokoLapak/Products/GetProductById',
            data : {kd_brg : id},
            method :'post',
            success : function(data){
                const a = JSON.parse(data);
                
                $('#kd_brg').val(a.kd_brg);
                $('.barang').html(a.nama_brg);
                
                
                $('.gambarrr').html(`<img class="img-cart " src="http://localhost/TokoLapak/assets/Users/img/product/`+ a.gambar+`" alt="">`);
            }
        });
    });

    $('.updateCart').on('click', function() {
        const id = $(this).data('id'); 

        $.ajax({
            url: 'http://localhost/TokoLapak/Transaksi/GetCartById',
            data : {kd_keranjang : id},
            method :'post',
            success : function(data){
                const b = JSON.parse(data);
                const c = b[0];
                $('#kd_keranjang').val(c.kd_keranjang);
                $('.quantityy').val(c.jumlah);

                
            }
        });
    });


    
    // $('.itemAll').change(function (e) { 
        

    //     // console.log(hargaBarang)
        
    //     if (this.checked) {
    //         $('.item').prop('checked', true)
    //     }else{
    //         $('.item').prop('checked', false)
    //     }

        
        
    // });
    
$('#checkout').prop('disabled', true); 
    let harga = 0;
    $('.item').change(function (e) { 
        let hargaBarang = $(this).data('price');

        // console.log(hargaBarang)
        // $('.item').prop('checked', true)

        if (this.checked) {
            harga += hargaBarang
            
        }else{
            
            harga -= hargaBarang
        }

        $('#total').val(harga)
        $('#totalHarga').html(`Rp. ` + harga)

        if (harga == 0) {
            $('#checkout').prop('disabled', true);
        }else{
            $('#checkout').prop('disabled', false);
        }
        
    });


    // $('#provinsi').change(function(){
    //     let prov_id = $(this).val();
        
    //     $.ajax({
    //         url: 'http://localhost/TokoLapak/Transaksi/getKota',
    //         method :'POST',
    //         data : {id : prov_id},
    //         async : false,
    //         dataType : 'json',
    //         success : function(data){
    //             var html = '';
    //             var i;
    //             for(i=0; i<data.length; i++){
    //                 html += '<option>'+data[i].nama_kota+'</option>';
    //             }

    //             $('#kootaa').html(html);
    //         }
    //     });
    // });

    $('#provinsi').change(function(){
        $('.kota').hide()
        $('.ongkir').hide()
        $.ajax({
            type : 'POST',
            url : 'http://localhost/TokoLapak/Transaksi/getKota',
            data : {id : $(this).val()},
            dataType :  'json',
            beforeSend : function(e){
                if(e && e.overrideMimeType) { 
                    e.overrideMimeType("application/json;charset=UTF-8"); 
                }
            },
            success : function(response){
                $('#kota').html(response.list_kota).show();
                
            },

            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error 
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            } 
        })
    });
    
    $('#kota').change(function(){
        // $('.kota').hide()
        // $('.ongkir').hide()
        $.ajax({
            type : 'POST',
            url : 'http://localhost/TokoLapak/Transaksi/getOngkir',
            data : {id : $(this).val()},
            dataType :  'json',
            beforeSend : function(e){
                if(e && e.overrideMimeType) { 
                    e.overrideMimeType("application/json;charset=UTF-8"); 
                }
            },
            success : function(response){
                $('#ongkir').html(response.list_ongkir).show();
                
            },

            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error 
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            } 
        })
    });
    






});