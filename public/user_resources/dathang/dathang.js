fetch('https://provinces.open-api.vn/api/')
    .then(response => response.json())
    .then(data => {
        const htmltp = data.map(function(currentValue, index){
            return `<option value="${currentValue.name}" data-value="${currentValue.code}">${currentValue.name}</option>`
        })
        document.querySelector('.thanhpho').insertAdjacentHTML('beforeend',htmltp.join(''));
        $('.thanhpho').on('change', '', function (e) {
            let selectedtpVal = $(".thanhpho option:selected").data('value');
            fetch('https://provinces.open-api.vn/api/d/')
                .then(response => response.json())
                .then(data => {
                    const htmltx = data.map(function(currentValue, index){
                        if (currentValue.province_code==selectedtpVal){
                            return `<option value="${currentValue.name}" data-value="${currentValue.code}">${currentValue.name}</option>`
                        }
                    })
                    document.querySelector('.thixa').innerHTML = htmltx.join();
                    $('.thixa').on('change', '', function (e) {
                        let selectedtxVal = $(".thixa option:selected").data('value');
                        fetch('https://provinces.open-api.vn/api/w/')
                            .then(response => response.json())
                            .then(data => {
                                const htmlp = data.map(function(currentValue, index){
                                    if (currentValue.district_code==selectedtxVal){
                                        return `<option value="${currentValue.name}">${currentValue.name}</option>`
                                    }
                                })
                                document.querySelector('.phuong').innerHTML = htmlp.join();

                            })
                    });
                })
        });
    })
    .catch(error => console.error(error))


$("#form-dathang").submit(function (e){
    let url = $('#form-dathang').attr('action');
    let urlNext = $('#form-dathang').data('value');
    let urlGioHang = $('#form-dathang').data('giohang');
    $.ajax({
        type:"POST",
        url:url,
        data:$('#form-dathang').serialize(),
        dataType:"json",
        success:function (data){
            if (data.code===200){
                Swal.fire({
                    position: 'Center',
                    icon: 'success',
                    title: 'Đặt hàng thành công',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = urlNext;
                }, 1500);
            }
            if (data.code===201){
                Swal.fire({
                    position: 'Center',
                    icon: 'error',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    window.location.href = urlGioHang;
                }, 1500);
            }
        }
    })
    e.preventDefault();
})

