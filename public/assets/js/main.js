<!-- Active class nav menu -->
$(function(){
    var current_page_URL = location.href;
    $( "a" ).each(function() {
        if ($(this).attr("href") !== "#") {
            var target_URL = $(this).prop("href");
            if (target_URL == current_page_URL) {
                $('nav a').parents('li, ul').removeClass('active');
                $(this).parent('li').addClass('active');
                $(this).closest('ul').addClass('show');
                return false;
            }
        }
    });
});
<!-- Calculate Remaining Quantities -->
function calculateRemaining(total_input,disch_input,remaining_input) {
    $(disch_input).blur(function() {
        if( ($(total_input).val()-$(disch_input).val()) < 0 ) {
            alert('Please enter a valid number.');
        } else {
            $(remaining_input).val($(total_input).val()-$(disch_input).val());
        }
    });
}

<!-- DataTable -->
$(document).ready(function() {
    $('#datatable').DataTable( {
        "order": []
    } );
} );
<!-- Manifest DataTable -->
$(document).ready(function() {
    $('#datatableManifest').DataTable( {
        "scrollX": true
    } );
} );
<!-- Trip DataTable -->
$(document).ready(function() {
    $('#tripdatatable').DataTable( {
        "scrollX": true
    } );
} );

<!-- Agency Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addAgency', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'agencyName' : $('.agencyName').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/agency/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#agencyModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editAgency', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#agencyEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/agency/'+id,
            dataType: "json",
            success: function (response) {
                $('#editAgencyName').val(response.agency.agency_name);
                $('#editAgencyId').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-agency', function (e) {
        if ($("#editAgencyForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editAgencyId').val();
            var data = {
                'agency_name' : $('#editAgencyName').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/agency/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#agencyEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.agencyDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var data = {
                    "_token": $('input[name="csrf-token"]').val(),
                    "id": delete_id
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: '/admin/agency/'+delete_id,
                    data: data,
                    success: function (response) {
                        swal(response.status, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }
                });
            }
        });
    });
} );

<!-- Cargo Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addCargo', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'cargoName' : $('.cargoName').val(),
                'cargoArabicName' : $('.cargoArabicName').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/cargo/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#cargoModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editCargo', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#cargoEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/cargo/'+id,
            dataType: "json",
            success: function (response) {
                $('#editCargoName').val(response.cargo.cargo_name);
                $('#editArabicName').val(response.cargo.cargo_arabic_name);
                $('#editCargoId').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-cargo', function (e) {
        if ($("#editCargoForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editCargoId').val();
            var data = {
                'cargo_name' : $('#editCargoName').val(),
                'cargo_arabic_name' : $('#editArabicName').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/cargo/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#cargoEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.cargoDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/cargo/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
} );

<!-- Package Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addPackage', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'packageName' : $('.packageName').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/package/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#packageModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editPackage', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#packageEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/package/'+id,
            dataType: "json",
            success: function (response) {
                $('#editPackageName').val(response.package.package_name);
                $('#editPackageId').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-package', function (e) {
        if ($("#editPackageForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editPackageId').val();
            var data = {
                'package_name' : $('#editPackageName').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/package/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#packageEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.packageDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/package/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
} );

<!-- Port Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addPort', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'portName' : $('.portName').val(),
                'portArabicName' : $('.portArabicName').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/port/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#portModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editPort', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#portEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/port/'+id,
            dataType: "json",
            success: function (response) {
                $('#editPortName').val(response.port.port_name);
                $('#editArabicName').val(response.port.port_arabic_name);
                $('#editPortId').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-port', function (e) {
        if ($("#editPortForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editPortId').val();
            var data = {
                'port_name' : $('#editPortName').val(),
                'port_arabic_name' : $('#editArabicName').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/port/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#portEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.portDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/port/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
} );

<!-- Receiver Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addReceiver', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'receiverName' : $('.receiverName').val(),
                'receiverCode' : $('.receiverCode').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/receiver/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#receiverModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editReceiver', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#receiverEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/receiver/'+id,
            dataType: "json",
            success: function (response) {
                $('#editReceiverName').val(response.receiver.receiver_name);
                $('#editCode').val(response.receiver.receiver_code);
                $('#editReceiverId').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-receiver', function (e) {
        if ($("#editReceiverForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editReceiverId').val();
            var data = {
                'receiver_name' : $('#editReceiverName').val(),
                'receiver_code' : $('#editCode').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/receiver/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#receiverEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.receiverDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/receiver/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
} );

<!-- Ship Type Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addShipType', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'ShipTypeName' : $('.shiptypeName').val(),
                'ShipTypeAB' : $('.shiptypeAB').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/shiptype/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#shiptypeModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editShipType', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#shiptypeEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/shiptype/'+id,
            dataType: "json",
            success: function (response) {
                $('#editShipTypeId').val(id);
                $('#editShipTypeName').val(response.shiptype.ship_type_name);
                $('#editShipTypeAB').val(response.shiptype.ship_type_ab);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-shiptype', function (e) {
        if ($("#editShipTypeForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editShipTypeId').val();
            var data = {
                'ship_type_name' : $('#editShipTypeName').val(),
                'ship_type_ab' : $('#editShipTypeAB').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/shiptype/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#shiptypeEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.shipTypeDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/shiptype/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
} );

<!-- Ships Function JS -->
$(document).ready(function () {

    <!-- View Ship Info JS -->
    $(document).on('click', '#infoShip', function (e) {
        e.preventDefault();
        var ship_id = $(this).closest("tr").find("#idShip").val();
        $('#infoship-modal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/ship/'+ship_id,
            dataType: "json",
            success: function (response) {
                $('#ship-info-name').text(response.ship.ship_name)
                $('#ship-info-type').text(response.ship.shiptype.ship_type_name)
                $('#imo-info-nb').text(response.ship.imo_number)
                $('#mssi-info').text(response.ship.mssi)
                $('#flag-info').text(response.ship.flag)
                $('#ex-info-name').text(response.ship.ex_name)
                $('#call-info-sign').text(response.ship.call_sign)
                $('#registry-info-port').text(response.ship.registry_port)
                $('#registry-info-number').text(response.ship.registration_number)
                $('#registry-info-date').text(response.ship.registration_date)
                $('#net-info-tonnage').text(response.ship.net_tonnage)
                $('#gross-info-tonage').text(response.ship.gross_tonnage)
                $('#dead-info-weight').text(response.ship.dead_weight)
                $('#info-dob').text(response.ship.date_of_built)
                $('#speed-info').text(response.ship.speed)
                $('#length-info').text(response.ship.overall_length)
                $('#draft-info').text(response.ship.draft)
                $('#breadth-info').text(response.ship.breadth)
                $('#depth-info').text(response.ship.depth)
                $('#color-info').text(response.ship.color)
                $('#isscnb-info').text(response.ship.issc)
                $('#pollutioncert-info').text(response.ship.pollition_certificate)
                $('#saftyequipment-cert-info').text(response.ship.safety_equipment_certificate)
                $('#radio-cert-info').text(response.ship.radio_telegraphy_certificate)
                $('#safty-cc-info').text(response.ship.safety_construction_certificate)
                $('#aso-machinery-info').text(response.ship.annuel_survey_of_machinery)
                $('#ll-certificate-info').text(response.ship.load_line_certificate)
                $('#owners-info').text(response.ship.owner)
                $('#charterers-info').text(response.ship.charterers)
            }
        });
    });

    <!-- Edit Ship Info JS -->
    $(document).on('click', '#editShip', function (e) {
        e.preventDefault();
        var ship_id = $(this).closest("tr").find("#idShip").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/ship/'+ship_id,
            dataType: "json",
            success: function (response) {
                $('#updateShipId').val(response.ship.id)
                $('#edit_ship_name').val(response.ship.ship_name)
                $('#ship_type').val(response.ship.ship_type)
                $('#imo_number').val(response.ship.imo_number)
                $('#mssi').val(response.ship.mssi)
                $('#flag').val(response.ship.flag)
                $('#ex_name').val(response.ship.ex_name)
                $('#call_sign').val(response.ship.call_sign)
                $('#registry_port').val(response.ship.registry_port)
                $('#registration_number').val(response.ship.registration_number)
                $('#registration_date').val(response.ship.registration_date)
                $('#net_tonnage').val(response.ship.net_tonnage)
                $('#gross_tonnage').val(response.ship.gross_tonnage)
                $('#dead_weight').val(response.ship.dead_weight)
                $('#date_of_built').val(response.ship.date_of_built)
                $('#speed').val(response.ship.speed)
                $('#overall_length').val(response.ship.overall_length)
                $('#draft').val(response.ship.draft)
                $('#breadth').val(response.ship.breadth)
                $('#depth').val(response.ship.depth)
                $('#color').val(response.ship.color)
                $('#issc').val(response.ship.issc)
                $('#pollition_certificate').val(response.ship.pollition_certificate)
                $('#safety_equipment_certificate').val(response.ship.safety_equipment_certificate)
                $('#radio_telegraphy_certificate').val(response.ship.radio_telegraphy_certificate)
                $('#safety_construction_certificate').val(response.ship.safety_construction_certificate)
                $('#annuel_survey_of_machinery').val(response.ship.annuel_survey_of_machinery)
                $('#load_line_certificate').val(response.ship.load_line_certificate)
                $('#owner').val(response.ship.owner)
                $('#charterers').val(response.ship.charterers)
            }
        });
    });

    <!-- Update Ship Info JS -->
    $(document).on('click', '#updateShipInfo', function (e) {
        e.preventDefault();
        var id = $('#updateShipId').val();
        var data = $('#updateShipForm').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: '/admin/ship/'+id,
            data: data,
            dataType: "json",
            success: function (response) {
                $('#update-ship').modal('hide');
                if(response.status == 200) {
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                } else if(response.status == 500) {
                    swal(response.message, {
                        icon: "error",
                    })
                }
            }
        });
    });

    <!-- Add Ship JS -->
    $(document).on('click', '#insertship-btn', function (e) {
        if ($("#isertship-form")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#isertship-form').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/ship/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }else if(response.status == 500) {
                        swal(response.message, {
                            icon: "error",
                        })
                    }
                }
            });
        }
    });

    <!-- Delete Ship JS -->
    $(document).on('click', '#deleteShip', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find("#idShip").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/ship/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
});

<!-- Ship Type in Ship Function JS -->

$(document).on('click', '#addNewShipType', function (e) {
    if ($("#needs-validation")[0].checkValidity()) {
        e.preventDefault();
        var data = {
            'ShipTypeName' : $('#shipTypeName').val(),
            'ShipTypeAB' : $('#shipTypeAB').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '/admin/shiptype/create',
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    $('#shipTypeModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        $('#shipTypeOption').append('<option value="'+response.id+'">'+response.shipTypeName+'</option>');
                    })
                } else {
                    swal({
                        title: "Error",
                        text: "Couldn't complete your request! Please try again.",
                        icon: "error",
                    })
                }
            }
        });
    }
});

<!-- Trip Function JS -->

$(document).ready(function () {
    <!-- Add Trip Function JS -->
    $(document).on('click', '#addtrip-btn', function (e) {
        if ($("#iserttrip-form")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#iserttrip-form').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/trip/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
        }
    });
    <!-- Delete Trip Function JS -->
    $(document).on('click', '#deleteTrip', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find("#idTrip").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/trip/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
    <!-- View Trip Function JS -->
    $(document).on('click', '#viewTrip', function (e) {
        e.preventDefault();
        var trip_id = $(this).closest("tr").find("#idTrip").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/trip/'+trip_id,
            dataType: "json",
            success: function (response) {
                $('#trip_id').text(response.trip.trip_number)
                $('#trip_date').text(response.trip.trip_date)
                $('#ship_name').text(response.trip.ship.ship_name)
                $('#agent_sign').text(response.trip.agent_code)
                $('#agent').text(response.trip.agency_name)
                $('#captain_name').text(response.trip.captain_name)
                $('#last_port').text(response.trip.ship_launching_port)
                $('#from_port').text(response.trip.ship_coming_from)
                $('#port_name').text(response.trip.port.port_name)
                $('#arrival_date').text(response.trip.expected_arrival_date)
                $('#depature_date').text(response.trip.departure_date)
                $('#arrival_time').text(response.trip.expected_arrival_time)
                $('#passengers').text(response.trip.passengers)
                $('#passengersin_transit').text(response.trip.passengers_transit)
                $('#crew').text(response.trip.crew_number)
                $('#destination').text(response.trip.ship_heading_to)
                $('#cargo_name').text(response.trip.cargo.cargo_name)
                $('#pack').text(response.trip.package.package_name)
                $('#total_weight').text(response.trip.shipment_quantity)
                $('#discharge_weight').text(response.trip.unload_quantity)
                $('#loading_weight').text(response.trip.loading_weight)
                $('#loaded_cargo').text(response.trip.loaded_cargo)
                $('#agency').text(response.trip.agency.agency_name)
                $('#reciever').text(response.trip.company_recieving)
            }
        });
    });
    <!-- Edit Trip Info JS -->
    $(document).on('click', '#editTrip', function (e) {
        e.preventDefault();
        var trip_id = $(this).closest("tr").find("#idTrip").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/trip/'+trip_id,
            dataType: "json",
            success: function (response) {
                $('#updatedTripID').val(response.trip.id)
                $('#update_trip_id').val(response.trip.trip_number)
                $('#update_trip_date').val(response.trip.trip_date)
                $('#update_ship_name').val(response.trip.ship_name_id)
                $('#update_agent_sign').val(response.trip.agent_code)
                $('#update_agent').val(response.trip.agency_name)
                $('#update_captain_name').val(response.trip.captain_name)
                $('#update_last_port').val(response.trip.ship_launching_port)
                $('#update_from_port').val(response.trip.ship_coming_from)
                $('#update_port_name').val(response.trip.port_name_id)
                $('#update_arrival_date').val(response.trip.expected_arrival_date)
                $('#update_depature_date').val(response.trip.departure_date)
                $('#update_arrival_time').val(response.trip.expected_arrival_time)
                $('#update_passengers').val(response.trip.passengers)
                $('#update_passengersin_transit').val(response.trip.passengers_transit)
                $('#update_crew').val(response.trip.crew_number)
                $('#update_destination').val(response.trip.ship_heading_to)
                $('#update_cargo_name').val(response.trip.cargo_name_id)
                $('#update_pack').val(response.trip.package_name_id)
                $('#update_total_weight').val(response.trip.shipment_quantity)
                $('#update_discharge_weight').val(response.trip.unload_quantity)
                $('#update_loaded_cargo').val(response.trip.loaded_cargo)
                $('#update_loading_weight').val(response.trip.loading_weight)
                $('#update_agency').val(response.trip.agency_name_id)
                $('#update_reciever').val(response.trip.company_recieving)
            }
        });
    });
    <!-- Update Trip Info JS -->
    $(document).on('click', '#updateTripBtn', function (e) {
        e.preventDefault();
        var id = $('#updatedTripID').val();
        var data = $('#update-trip-form').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: '/admin/trip/'+id,
            data: data,
            dataType: "json",
            success: function (response) {
                $('#update-trip').modal('hide');
                if(response.status == 200) {
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                } else if(response.status == 500) {
                    swal(response.message, {
                        icon: "error",
                    })
                }
            }
        });
    });
});
<!-- Add Cargos, packages, ports and agencies in Trip Function JS -->
$(document).ready(function () {
    <!-- Agency in Trip Function JS -->
    $(document).on('click', '#addAgencyinTrip', function (e) {
        if ($("#agencyForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#agencyForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/agency/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        $('#agencyinTripModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            $('#agencies').append('<option value="'+response.id+'">'+response.agency_name+'</option>');
                        })
                    }
                }
            });
        }
    });
    <!-- Port in Trip Function JS -->
    $(document).on('click', '#addPortinTrip', function (e) {
        if ($("#portForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#portForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/port/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        $('#portinTripModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            $('#ports').append('<option value="'+response.id+'">'+response.port_name+'</option>');
                        })
                    }
                }
            });
        }
    });
    <!-- Cargo in Trip Function JS -->
    $(document).on('click', '#addCargoinTrip', function (e) {
        if ($("#cargoForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#cargoForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/cargo/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        $('#cargoinTripModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            $('#cargo').append('<option value="'+response.id+'">'+response.cargo_name+'</option>');
                        })
                    }
                }
            });
        }
    });
    <!-- Package in Trip Function JS -->
    $(document).on('click', '#addPackageinTrip', function (e) {
        if ($("#packageForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#packageForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/package/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        $('#packageinTripModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            $('#packs').append('<option value="'+response.id+'">'+response.package_name+'</option>');
                        })
                    }
                }
            });
        }
    });
});

<!-- Manifest Function JS -->
$(document).ready(function () {
    <!-- Add Manifest Function JS -->
    $('#addBillOfLading').hide();
    $(document).on('click', '#addManifest', function (e) {
        if ($(".needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#manifestForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/manifest/create',
                data: data,
                success: function (response) {
                    if(response.status == 200) {
                        $('#insertedManifestID').val(response.manifestID)
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            $('#addManifest').attr('disabled',true);
                            $('#addBillOfLading').show();
                        })
                    }
                }
            });
        }
    });

    <!-- Edit -->
    $(document).on('click', '#editManifest', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find("#manifestId").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/manifest/'+id,
            dataType: "json",
            success: function (response) {
                $('#update_load_port').val(response.manifest.loading_port);
                $('#update_sail').val(response.manifest.sailing_date);
                $('#update_dis_port').val(response.manifest.discharging_port);
                $('#update_next_port').val(response.manifest.next_discharging_port);
                $('#update_process').val(response.manifest.process);
                $('#update_qty').val(response.manifest.total_qty);
                $('#update_wght').val(response.manifest.total_weight);
                $('#update_mn_id').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '#update_Manifest', function (e) {
        e.preventDefault();
        var id = $('#update_mn_id').val();
        var data = $('#updateManifest').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: '/admin/manifest/'+id,
            data: data,
            success: function (response) {
                $('#update-manifest').modal('hide');
                swal(response.message, {
                    icon: "success",
                }).then((result) => {
                    location.reload();
                })
            }
        });
    });

    <!-- Delete Manifest Function JS -->
    $(document).on('click', '#manifestID', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find("#manifestId").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/manifest/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.msg, {
                                icon: response.icon,
                            }).then((result) => {
                                location.reload();
                            })
                        },
                        error: function (jqXHR) {
                            if (jqXHR.status === 500) {
                                swal({
                                    text: "Manifest can't be deleted, it has related bill of lading(s).",
                                    icon: "warning",
                                    dangerMode: true,
                                })
                            }
                        }
                    });
                }
            });
    });
    <!-- Edit Bill of Lading Function JS -->
    $(document).on('click', '#editBill', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find("#billID").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/billoflading/'+id,
            dataType: "json",
            success: function (response) {
                $('#update_billnb').val(response.billLading.billnb);
                $('#update_shipper').val(response.billLading.shipper);
                $('#update_consignee').val(response.billLading.consignee);
                $('#update_notify').val(response.billLading.notify);
                $('#update_cargo').val(response.billLading.cargo_id);
                $('#update_package').val(response.billLading.package_id);
                $('#update_qty').val(response.billLading.quantity);
                $('#update_wght').val(response.billLading.weight);
                $('#update_t_qty').val(response.billLading.transitQty);
                $('#update_t_wght').val(response.billLading.transitWeight);
                $('#update_t_pack').val(response.billLading.transitPack);
                $('#update_t_cargo').val(response.billLading.transitCargo);
                $('#billLadingID').val(id);
            }
        });
    });
    <!-- Update Bill of Lading Function JS -->
    $(document).on('click', '#update_bill_of_lading', function (e) {
        e.preventDefault();
        var id = $('#billLadingID').val();
        var data = $('#updateBillofLadingForm').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: '/admin/billoflading/'+id,
            data: data,
            success: function (response) {
                $('#update-bill').modal('hide');
                if(response.status == 200) {
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            }
        });
    });
    <!-- Add Bill of Lading Function JS -->
    $(document).on('click', '#addNewBillLading', function (e) {
        if ($("#billofLadingForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#billofLadingForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/billoflading/create',
                data: data,
                success: function (response) {
                    $('#billofLadingModal').modal('hide');
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
        }
    });
    <!-- Add Bill of Lading in manifest directly Function JS -->
    $(document).on('click', '#addBillLading', function (e) {
        if ($("#billofLadingForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#billofLadingForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/billoflading/create',
                data: data,
                success: function (response) {
                    $('#billofLadingModal').modal('hide');
                    $('#billofLadingForm')[0].reset();
                    $('#qty-bill').attr('readonly', false);
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        })
                        $('#refreshDataTable').attr('disabled',false);
                    }
                }
            });
        }
    });
    $('#refreshDataTable').attr('disabled',true);
    <!-- Refresh Datatable Bill of Lading Function JS -->
    $(document).on('click', '#refreshDataTable', function (e) {
        e.preventDefault();
        var mnID = $('#insertedManifestID').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '/admin/billoflading/mn',
            data: {'manifest_id' : mnID},
            dataType: "json",
            success: function (response) {
                if(response.status == 200) {
                    let status = '';
                    var result=response.billLading;
                    $('#billLadingData > tbody').empty();
                    $.each(result,function(idx, obj){
                        if (obj['discharge'] == null) {
                            status = '';
                        } else {
                            status = 'disabled';
                        }
                        $('#billLadingData > tbody').append("<tr><input type='hidden' id='billID' value='"+ obj['id'] +"'><td>"+obj['shipper']+"</td>" +
                            "<td>"+obj['consignee']+"</td>" +
                            "<td>"+obj['notify']+"</td>" +
                            "<td>"+obj['cargo']['cargo_name']+"</td>" +
                            "<td>"+obj['package']['package_name']+"</td>" +
                            "<td>"+obj['quantity']+"</td>" +
                            "<td>"+obj['weight']+"</td>"
                        )
                    });
                    $('#refreshDataTable').attr('disabled',true);
                }
            }
        });
    });
    <!-- Discharging Plan Function JS -->
    $(document).on('click', '#addDischargingPlan', function (e) {
        e.preventDefault();
        var bill_id = $(this).closest("tr").find("#billID").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/billoflading/'+bill_id,
            dataType: "json",
            success: function (response) {
                $('#cargo_dis_plan').val(response.billLading.cargo.cargo_name);
                $('#qty_dis_plan').val(response.billLading.quantity);
                $('#wght_dis_plan').val(response.billLading.weight);
                $('#disQty').val('');
                $('#disWeight').val('');
                $('#remainingQty').val('');
                $('#remainingWght').val('');
                $('#billLadingDischargingPlan').val(bill_id);
            }
        });
        calculateRemaining("#qty_dis_plan","#disQty","#remainingQty");
        calculateRemaining("#wght_dis_plan","#disWeight","#remainingWght");
    });
    <!-- Add Discharging Plan Function JS -->
    $(document).on('click', '#saveDischargingPlan', function (e) {
        if ($("#dischargingPlanForm")[0].checkValidity()) {
            e.preventDefault();
            var id_bill = $('#billLadingDischargingPlan').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: '/admin/fetch/'+id_bill,
                dataType: "json",
                success: function (response) {
                    if(response.discharge.length == 0) {
                        var data = $('#dischargingPlanForm').serialize();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: '/admin/dischargingplan/create',
                            data: data,
                            success: function (response) {
                                $('#dischargingPlanModal').modal('hide');
                                if(response.status == 200) {
                                    swal(response.message, {
                                        icon: "success",
                                    })
                                }
                            }
                        });
                    } else {
                        swal(response.message, {
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Delete Bill of lading Function JS -->
    $(document).on('click', '#deleteBill', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find("#billID").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/billoflading/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
});

<!-- Discharging Plan Function JS -->
$(document).ready(function () {
    <!-- Add Modal Discharging Plan Function JS -->
    $(document).on('click', '#addNewDischargingPlan', function (e) {
        e.preventDefault();
        var bill_id = $(this).closest("tr").find("#billID").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/billoflading/'+bill_id,
            dataType: "json",
            success: function (response) {
                $('#cargoDischargingPlan').val(response.billLading.cargo.cargo_name);
                $('#quantityDischargingPlan').val(response.billLading.quantity);
                $('#weightDischargingPlan').val(response.billLading.weight);
                $('#dischargingQuantity').val('');
                $('#dischargingWeight').val('');
                $('#remainingQuantity').val('');
                $('#remainingWeight').val('');
                $('#billOfLading').val(bill_id);
            }
        });
        calculateRemaining("#quantityDischargingPlan","#dischargingQuantity","#remainingQuantity");
        calculateRemaining("#weightDischargingPlan","#dischargingWeight","#remainingWeight");
    });
    <!-- Add Discharging Plan Function JS -->
    $(document).on('click', '#createDischargingPlan', function (e) {
        if ($("#createDischargingPlanForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#createDischargingPlanForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/dischargingplan/create',
                data: data,
                success: function (response) {
                    $('#dischargingPlanModal').modal('hide');
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
        }
    });
    <!-- Edit Discharging Plan Function JS -->
    $(document).on('click', '#edit-discharging-plan', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find("#dischargeID").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/dischargingplan/'+id,
            dataType: "json",
            success: function (response) {
                $('#disQty').val(response.discharge.discharging_qty);
                $('#disWeight').val(response.discharge.discharging_wght);
                $('#cargo_dis_plan').val(response.discharge.bill.cargo.cargo_name);
                $('#qty_dis_plan').val(response.discharge.bill.quantity);
                $('#wght_dis_plan').val(response.discharge.bill.weight);
                $('#billLadingDischargingPlan').val(response.discharge.id);
                $('#remainingQty').val( (response.discharge.bill.quantity) - (response.discharge.discharging_qty) );
                $('#remainingWght').val( (response.discharge.bill.weight) - (response.discharge.discharging_wght) );
                $('#dischargingPlan_ID').val(response.discharge.id);
            }
        });
        calculateRemaining("#qty_dis_plan","#disQty","#remainingQty");
        calculateRemaining("#wght_dis_plan","#disWeight","#remainingWght");
    });

    <!-- Update Discharging Plan Function JS -->
    $(document).on('click', '#updateDischargingPlan', function (e) {
        if ($("#createDischargingPlanForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#dischargingPlan_ID').val();
            var data = $('#createDischargingPlanForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/dischargingplan/'+id,
                data: data,
                success: function (response) {
                    $('#update-bill').modal('hide');
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
        }
    });
    <!-- Delete Discharging Plan Function JS -->
    $(document).on('click', '#deleteDischargingPlan', function (e) {
        e.preventDefault();
        var delete_id = $('#dischargingPlan_ID').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/dischargingplan/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
});

<!-- Crew Function JS -->
$(document).ready(function () {
    <!-- Crew Trip ID Function JS -->
    $(document).on('click', '#addCrew', function (e) {
        var trip_id = $(this).closest("tr").find("#idTrip").val();
        $('#tripID').val(trip_id);
    });
    <!-- Add Crew Function JS -->
    $(document).on('click', '#createCrew', function (e) {
        if ($("#createCrewForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#createCrewForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/crew/create',
                data: data,
                success: function (response) {
                    $('#dischargingPlanModal').modal('hide');
                    if(response.status == 200) {
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
        }
    });
    <!-- Delete Crew Function JS -->
    $(document).on('click', '#deleteCrew', function (e) {
        e.preventDefault();
        var crew_id = $(this).closest("tr").find("#crewID").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": crew_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/crew/'+crew_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
    <!-- Edit Crew Function JS -->
    $(document).on('click', '#editCrewInfo', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find("#crewID").val();
        $('#editcrewModal').modal('hide');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/crew/'+id,
            dataType: "json",
            success: function (response) {
                $('#sign').val(response.crew.sign);
                $('#firstName').val(response.crew.first_name);
                $('#lastName').val(response.crew.last_name);
                $('#dateBirth').val(response.crew.date_of_birth);
                $('#crew_nationality').val(response.crew.nationality);
                $('#passport').val(response.crew.passport_number);
                $('#seamanNB').val(response.crew.seaman_book_number);
                $('#crewIDInfo').val(response.crew.id);
                $('#company').val(response.crew.company_id);
                if(response.crew.is_transfer_completed == 1) {
                    $('#transfer').attr("checked", "checked");
                } else {
                    $('#transfer').attr("checked", false);
                }
            }
        });
    });
    <!-- Update Crew Function JS -->
    $(document).on('click', '#updateCrewInfo', function (e) {
        if ($("#editCrewForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#crewIDInfo').val();
            var data = $('#editCrewForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/crew/'+id,
                data: data,
                success: function (response) {
                    $('#editcrewModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });
});

<!-- User -->
$(document).ready(function () {
    <!-- Add User -->
    $(document).on('click', '#addNewUser', function (e) {
        if ($("#addUserForm")[0].checkValidity()) {
            e.preventDefault();
            var data = $('#addUserForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/user/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#userModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit User -->
    $(document).on('click', '#editUser', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find("#user_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/user/'+id,
            dataType: "json",
            success: function (response) {
                $('#editUserName').val(response.user.name);
                $('#editUserEmail').val(response.user.email);
                $('#userID').val(id);
            }
        });
    });

    <!-- Update User -->
    $(document).on('click', '#updateUser', function (e) {
        if ($("#editUserForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#userID').val();
            var data = $('#editUserForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/user/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#editUserForm').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete User -->
    $(document).on('click', '#userDeleteBtn', function (e) {
        e.preventDefault();

        var user_id = $(this).closest("tr").find("#user_id").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": user_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/user/'+user_id,
                        data: data,
                        success: function (response) {
                            if(response.status == 200) {
                                swal(response.message, {
                                    icon: "success",
                                }).then((result) => {
                                    location.reload();
                                })
                            } else {
                                swal(response.message, {
                                    icon: "error"
                                })
                            }
                        }
                    });
                }
            });
    });
});

<!-- Transit -->
$(document).ready(function () {
    <!-- Add Transit -->
    $(document).on('click', '#add_trans', function (e) {
        if($('#add_transit')[0].checkValidity()){
            e.preventDefault();
            var data = $('#add_transit').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/transit/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#transitModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Edit Transit -->
    $(document).on('click', '#editTransit', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find("#transit_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/transit/'+id,
            dataType: "json",
            success: function (response) {
                $('#transit_Qty').val(response.transit.transitQty);
                $('#transit_Wght').val(response.transit.transitWeight);
                $('#transit_Pack').val(response.transit.transitPack);
                $('#transit_Cargo').val(response.transit.transitCargo);
                $('#mnID').val(response.transit.manifest_id);
                $('#tnstID').val(id);
            }
        });
    });

    <!-- Update Transit -->
    $(document).on('click', '#update_transit', function (e) {
        if ($("#updateTransit")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#tnstID').val();
            var data = $('#updateTransit').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/transit/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#editUserForm').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete Transit -->
    $(document).on('click', '#deleteTransit', function (e) {
        e.preventDefault();

        var id = $(this).closest("tr").find("#transit_id").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/transit/'+id,
                        data: data,
                        success: function (response) {
                            if(response.status == 200) {
                                swal(response.message, {
                                    icon: "success",
                                }).then((result) => {
                                    location.reload();
                                })
                            } else {
                                swal(response.message, {
                                    icon: "error"
                                })
                            }
                        }
                    });
                }
            });
    });
});
<!-- Bulk Quantity -->
$(document).ready(function () {
    $('#bulk-qty').on('change',function() {
        var selectedVal = $(this).find('option:selected').text();
        var trimStr = $.trim(selectedVal);
        if( String(trimStr.toUpperCase()) == String("BULK")) {
            $('#qty-bill').attr('readonly','readonly');
            $('#qty-bill').val(1);
        }
    });
});

<!-- Company Function JS -->
$(document).ready(function() {
    <!-- Add -->
    $(document).on('click', '#addCompany', function (e) {
        if ($("#needs-validation")[0].checkValidity()) {
            e.preventDefault();
            var data = {
                'name' : $('.companyName').val(),
                'country' : $('.country').val(),
                'address' : $('.address').val()
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/company/create',
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200) {
                        $('#companyModal').modal('hide');
                        swal(response.message, {
                            icon: "success",
                        }).then((result) => {
                            location.reload();
                        })
                    } else {
                        swal({
                            title: "Error",
                            text: "Couldn't complete your request! Please try again.",
                            icon: "error",
                        })
                    }
                }
            });
        }
    });
    <!-- Edit -->
    $(document).on('click', '.editCompany', function (e) {
        e.preventDefault();
        var id = $(this).closest("tr").find(".delete_val").val();
        $('#companyEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/company/'+id,
            dataType: "json",
            success: function (response) {
                $('#editCompanyName').val(response.company.name);
                $('#editCountry').val(response.company.country);
                $('#editAddress').val(response.company.address);
                $('#editCompanyId').val(id);
            }
        });
    });

    <!-- Update -->
    $(document).on('click', '.edit-company', function (e) {
        if ($("#editCompanyForm")[0].checkValidity()) {
            e.preventDefault();
            var id = $('#editCompanyId').val();
            var data = {
                'name' : $('#editCompanyName').val(),
                'country' : $('#editCountry').val(),
                'address' : $('#editAddress').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: '/admin/company/'+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#companyEditModal').modal('hide');
                    swal(response.message, {
                        icon: "success",
                    }).then((result) => {
                        location.reload();
                    })
                }
            });
        }
    });

    <!-- Delete -->
    $(document).on('click', '.companyDeleteBtn', function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".delete_val").val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: '/admin/company/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            });
    });
} );

<!-- Discharging Plan for each trip -->
$(document).ready(function () {
    $(document).on('click', '#dischargePlan', function (e) {
        e.preventDefault();
        $('#createDischargingPlan').hide();
        $('#updateDischargingPlan').hide();
        $('#quantityDischargingPlan').val('');
        $('#dischargingQuantity').val('');
        $('#remainingQuantity').val('');
        $('#weightDischargingPlan').val('');
        $('#dischargingWeight').val('');
        $('#remainingWeight').val('');
        $('#cargo-lst').empty();
        var trip_id = $(this).closest("tr").find("#idTrip").val();
        $('#companyEditModal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/billoflading/cargo/'+trip_id,
            dataType: "json",
            success: function (response) {
                $('#cargo-lst').append("<option value=''></option>");
                $.each(response.billLading,function(idx, obj){
                    $('#cargo-lst').append("<option value='" + obj['cargo_id'] + "'>" +obj['cargo']['cargo_name'] + "</option>")
                });
                $('#trip_id_to_call').val(trip_id);
            }
        });
    });
} );

<!-- Cargo Change -->
$(document).ready(function () {
    $('#cargo-lst').on('change',function() {
        var selectedVal = $(this).find('option:selected').text();
        var trimStr = $.trim(selectedVal);
        var trip_id = $('#trip_id_to_call').val();
        var cargo_id = $(this).find('option:selected').val();
        $('#quantityDischargingPlan').val('');
        $('#dischargingQuantity').val('');
        $('#remainingQuantity').val('');
        $('#weightDischargingPlan').val('');
        $('#dischargingWeight').val('');
        $('#remainingWeight').val('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/admin/billoflading/cargoqtywght/'+trip_id+'/'+cargo_id,
            dataType: "json",
            success: function (response) {
                console.log(response.package[0].package.package_name.toUpperCase());
                if(response.is_found.length != 0 ) {
                    if(response.package[0].package.package_name.toUpperCase() == 'BULK') {
                        $('#quantityDischargingPlan').val(1);
                    } else {
                        $('#quantityDischargingPlan').val(response.totalQuantity);
                    }
                    $('#weightDischargingPlan').val(response.totalWeight);
                    $('#dischargingQuantity').val(response.is_found[0].discharging_qty);
                    $('#dischargingWeight').val(response.is_found[0].discharging_wght);
                    $('#dischargingPlan_ID').val(response.is_found[0].id);
                    $('#createDischargingPlan').hide();
                    $('#updateDischargingPlan').show();
                } else {
                    if(response.package[0].package.package_name.toUpperCase() == 'BULK') {
                        $('#quantityDischargingPlan').val(1);
                    } else {
                        $('#quantityDischargingPlan').val(response.totalQuantity);
                    }
                    $('#weightDischargingPlan').val(response.totalWeight);
                    $('#createDischargingPlan').show();
                    $('#updateDischargingPlan').hide();
                }
            }
        });
    });
});

<!-- Remaining Quantity -->
$(document).ready(function () {
    $('#dischargingQuantity').on('change',function() {
        calculateRemaining("#quantityDischargingPlan","#dischargingQuantity","#remainingQuantity");
    });
    $('#dischargingWeight').on('change',function() {
        calculateRemaining("#weightDischargingPlan","#dischargingWeight","#remainingWeight");
    });
});
