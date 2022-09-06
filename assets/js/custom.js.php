<?php
$Products = (new Inventory)->get_products();
$All_Products = $Products['data'];
?>
<!-- Backend Foot HTML -->
<!-- Product Delete Form -->
<form id="dPf" method="POST" action="<?php echo $ACTION['product_delete']; ?>">
    <input type="hidden" name="p_id" />
</form>
<!-- Catagory Delete Form -->
<form id="dCf" method="POST" action="<?php echo $ACTION['catag_delete']; ?>">
    <input type="hidden" name="c_name" />
</form>
<!-- Catagory Add Form -->
<form id="aCf" method="POST" action="<?php echo $ACTION['catag_add']; ?>">
    <input type="hidden" name="c_name" />
</form>
<!-- Catagory Edit Form -->
<form id="eCf" method="POST" action="<?php echo $ACTION['catag_edit']; ?>">
    <input type="hidden" name="c_newname" />
    <input type="hidden" name="c_name" />
</form>
<!-- Wholesaler Delete Form -->
<form id="dWf" method="POST" action="<?php echo $ACTION['delete_wholesalers']; ?>">
    <input type="hidden" name="wholesalerID" />
</form>
<!-- Customer Delete Form -->
<form id="dCUf" method="POST" action="<?php echo $ACTION['delete_customers']; ?>">
    <input type="hidden" name="cust_id" />
</form>
<!-- Order Delete Form -->
<form id="delOrder" method="POST" action="<?php echo $ACTION['delete_order']; ?>">
    <input type="hidden" name="order_id" />
</form>
<!-- Courier Delete Form -->
<form id="delCourier" method="POST" action="<?php echo $ACTION['delete_courier']; ?>">
    <input type="hidden" name="courier_id" />
</form>
<!-- Payment Delete Form -->
<form id="delPayment" method="POST" action="<?php echo $ACTION['delete_wealth']; ?>">
    <input type="hidden" name="e_id" />
</form>
<!-- Delete Employee Form -->
<form id="delEmployee" method="POST" action="<?php echo $ACTION['delete_employee']; ?>">
    <input type="hidden" name="user_id" />
</form>
<!-- Delete Payroll Form -->
<form id="delPayroll" method="POST" action="<?php echo $ACTION['delete_payroll']; ?>">
    <input type="hidden" name="payroll_id" />
</form>
<?php
// Footer PHP Dependenices
if (isset($_SESSION['notification'])) {
    isset($_SESSION['notification']['type']) ? $_SESSION['notification']['type'] : 'info';
    isset($_SESSION['notification']['position']) ? $_SESSION['notification']['position'] : 'top-right';
    $randomId = rand(0, 9999) . date('y-m-s-i');
    echo "
    <div class='jq-toast-wrap notif-{$randomId} {$_SESSION['notification']['position']}'>
        <div class='jq-toast-single jq-has-icon jq-icon-{$_SESSION['notification']['type']}' style='text-align: left;'>
            <span onclick='document.querySelector(`.notif-{$randomId}`).remove();' class='close-jq-toast-single'>×</span>
            <h2 class='jq-toast-heading'>{$_SESSION['notification']['title']}</h2>
            {$_SESSION['notification']['message']}
        </div>
    </div>
    ";
    if ($_SESSION['notification']['type'] == 'danger') {
        echo "
            <script type='text/javascript'>
                console.error(`BACKEND => {$_SESSION['notification']['console_log']}`);
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                console.log(`BACKEND => {$_SESSION['notification']['console_log']}`);
            </script>
        ";
    }
    unset($_SESSION['notification']);
}
?>
<!-- Global Function Script -->
<script>
    function smartRadioAct(thisField) {
        let remoteFieldName = thisField.getAttribute('data-field-name');
        let remoteOnValue = thisField.getAttribute('data-on-value');
        let remoteOffValue = thisField.getAttribute('data-off-value');
        let remoteParentDiv = $(thisField.getAttribute('data-parent-div'));
        let remoteChecked = thisField.checked;
        let field = null;
        if (document.querySelectorAll(`[name="${remoteFieldName}"]`).length > 0) {
            if (remoteChecked) {
                $(`[name="${remoteFieldName}"]`).val(remoteOnValue)
            } else {
                $(`[name="${remoteFieldName}"]`).val(remoteOffValue)
            }
        } else {
            if (remoteChecked) {
                field = `
                    <input type="hidden" name="${remoteFieldName}" value="${remoteOnValue}" />
                `;
            } else {
                field = `
                    <input type="hidden" name="${remoteFieldName}" value="${remoteOffValue}" />
                `;
            }
            remoteParentDiv.prepend(field);
        }
    }
    $('[data-smartradio="true"]').on('change', function() {
        smartRadioAct(this);
    });
    let allSmartRadios = document.querySelectorAll('[data-smartradio="true"]');
    for (let i = 0; i < allSmartRadios.length; i++) {
        smartRadioAct(allSmartRadios[i]);
    }
    // Smart Switch Works Ends Here

    function toggleDivs(div1, div2) {
        let divOne = document.querySelector(div1);
        let divTwo = document.querySelector(div2);
        if (divOne.classList.contains('d-none')) {
            divOne.classList.remove('d-none');
            divTwo.classList.add('d-none');
        } else if (divTwo.classList.contains('d-none')) {
            divOne.classList.add('d-none');
            divTwo.classList.remove('d-none');
        } else {
            divOne.classList.add('d-none');
        }
    }
</script>
<!-- Backend Related Js Below -->
<script>
    function deleteProduct(prodId) {
        let delConfirm = confirm("Are you Sure!");
        if (delConfirm) {
            $('#dPf [name="p_id"]').val(prodId);
            $('#dPf').submit();
        }
    }
    // Catagory Scripts
    function addCatagory() {
        let catagoryName = prompt("Enter catagory name");
        if (catagoryName != null) {
            $('#aCf [name="c_name"]').val(catagoryName);
            $('#aCf').submit();
        }
    }

    function updateCatagory(catag_name) {
        let catagoryName = prompt("Enter Updated Name for this catagory");
        if (catagoryName != null) {
            $('#eCf [name="c_name"]').val(catag_name);
            $('#eCf [name="c_newname"]').val(catagoryName);
            $('#eCf').submit();
        }
    }

    function deleteCatagory(catag_name) {
        let delConfirm = confirm("Are you Sure you want to delete this catagory!");
        if (delConfirm) {
            $('#dCf [name="c_name"]').val(catag_name);
            $('#dCf').submit();
        }
    }
    // Wholesalers Scripts
    function updateWholesalers(wholesaler_data) {
        $('#uWf [name="wholesalerName"]').val(wholesaler_data.wholesaler_name);
        $('#uWf [name="wholesaleCatagory"]').val(wholesaler_data.wholesaler_catagory);
        $('#uWf [name="wholesalerNumber"]').val(wholesaler_data.wholesale_number);
        $('#uWf [name="wholesalerWhatsapp"]').val(wholesaler_data.wholesale_whatsapp);
        $('#uWf [name="wholesalerAddress"]').val(wholesaler_data.wholesaler_address);
        $('#uWf [name="wholesalerID"]').val(wholesaler_data.wholesale_id);
        $('#editWholesalersModal').modal('toggle');
    }

    function deleteWholesaler(wholesalerID) {
        let delConfirm = confirm("Are you Sure!");
        if (delConfirm) {
            $('#dWf [name="wholesalerID"]').val(wholesalerID);
            $('#dWf').submit();
        }
    }
    // Customer Scripts
    function updateCustomers(customer_data) {
        $('#uCf [name="cust_id"]').val(customer_data.cust_id);
        $('#uCf [name="cust_name"]').val(customer_data.cust_name);
        $('#uCf [name="cust_phone"]').val(customer_data.cust_phone);
        $('#uCf [name="cust_whatsapp"]').val(customer_data.cust_whatsapp);
        $('#uCf [name="cust_state_prov"]').val(customer_data.cust_state_prov);
        $('#uCf [name="cust_city_region"]').val(customer_data.cust_city_region);
        $('#uCf [name="cust_address"]').val(customer_data.cust_address);
        $('#uCf [name="cust_source"]').val(customer_data.cust_source);
        $('#uCf [name="cust_add_info"]').val(customer_data.cust_add_info);
        $('#editCustomersModal').modal('toggle');
    }

    function deleteCustomer(cust_id) {
        let delConfirm = confirm("Are you Sure!");
        if (delConfirm) {
            $('#dCUf [name="cust_id"]').val(cust_id);
            $('#dCUf').submit();
        }
    }

    function deleteRow(rawOrderRow, orderBar, universalclass) {
        if ($(`#${orderBar}[data-childs]`).attr('data-childs') != '1') {
            document.querySelector(rawOrderRow).remove();
            $(`#${orderBar}[data-childs]`).attr('data-childs', document.querySelectorAll(`.${universalclass}`).length);
        } else {
            alert('This Row Cannot be deleted!')
        }
    }

    function appendDuplicateOrderItem(orderBar, orderChildAttr, universalclass) {
        let childCount = parseInt($(orderBar).attr(orderChildAttr)) + 1;
        let appendix;
        if (orderBar == '#officialOrderItemBar') {
            appendix = `
                <div class="row mt-1 officialOrderRow" id="officialOrder${childCount}-row">
                    <div class="col-md-3 p-md-1">
                        <select class="form-control" name="officialOrder[${childCount}][Item]">
                            <?php
                            if (count($All_Products) > 0) {
                                for ($i = 0; $i < count($All_Products); $i++) {
                                    $Product = $All_Products[$i];
                            ?>
                                <option value="<?php echo $Product['prod_id']; ?>"><?php echo $Product['prod_name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-2 p-md-1">
                        <input type="number" name="officialOrder[${childCount}][Quantity]" id="officialOrder${childCount}[Quantity]" class="form-control" placeholder="Quantity" />
                    </div>
                    <div class="col-md-3 p-md-1">
                        <input type="number" name="officialOrder[${childCount}][PricePurchase]" id="officialOrder${childCount}[PricePurchase]" class="form-control" placeholder="Price (Purchased)" />
                    </div>
                    <div class="col-md-3 p-md-1">
                        <input type="number" name="officialOrder[${childCount}][PriceSold]" id="officialOrder${childCount}[PriceSold]" class="form-control" placeholder="Price (Sold)" />
                    </div>
                    <div class="col-md-1 p-md-1">
                        <a href="javascript:;" class="btn btn-primary float-right btn-sm m-0 ml-md-1" onclick="deleteRow('#officialOrder${childCount}-row', 'officialOrderItemBar', 'officialOrderRow')"> <i class="fa fa-times text-white"></i> </a>
                    </div>
                </div>
            `;
        } else {
            appendix = `
                <div class="row mt-1 rawOrderRow" id="rawOrder${childCount}-row">
                    <div class="p-md-1 col-md-3">
                        <input type="text" name="rawOrder[${childCount}][Item]" id="rawOrder${childCount}[Item]" class="form-control" placeholder="Enter Item Name Details" />
                    </div>
                    <div class="p-md-1 col-md-2">
                        <input type="number" name="rawOrder[${childCount}][Quantity]" id="rawOrder${childCount}[Quantity]" class="form-control" placeholder="Quantity" />
                    </div>
                    <div class="p-md-1 col-md-3">
                        <input type="number" name="rawOrder[${childCount}][PricePurchase]" id="rawOrder${childCount}[PricePurchase]" class="form-control" placeholder="Price (Purchased)" />
                    </div>
                    <div class="p-md-1 col-md-3">
                        <input type="number" name="rawOrder[${childCount}][PriceSold]" id="rawOrder${childCount}[PriceSold]" class="form-control" placeholder="Price (Sold)" />
                    </div>
                    <div class="p-md-1 col-md-1">
                        <a href="javascript:;" class="btn btn-primary float-right btn-sm m-0 ml-md-1" onclick="deleteRow('#rawOrder${childCount}-row', 'orderItemBar', 'rawOrderRow')"> <i class="fa fa-times text-white"></i> </a>
                    </div>
                </div>
            `;
        }
        $(orderBar).append(appendix);
        $(`${orderBar}[data-childs]`).attr('data-childs', document.querySelectorAll(`.${universalclass}`).length);
    }

    function deleteOrder(orderID) {
        let delConfirm = confirm("Are you Sure you want to delete this order!");
        if (delConfirm) {
            $('[name="order_id"]').val(orderID);
            $('#delOrder').submit();
        }
    }

    // Doing Couriers Js
    function seeAuth(auth) {
        $('#courierUserDisplay').val(auth.user != '' ? auth.user : 'No Username');
        $('#courierPasswordDisplay').val(auth.password != '' ? auth.password : 'No Password');
        $('#viewAuthCouriersModal').modal('toggle');
    }
    // Delete Courier
    function deleteCourier(courierId) {
        let delConfirm = confirm("Are you Sure you want to delete this courier!");
        if (delConfirm) {
            $('#delCourier [name="courier_id"]').val(courierId);
            $('#delCourier').submit();
        }
    }
    // Edit Courier
    function updateCouriers(updatedInfo) {
        $('.editCourier #courierId').val(updatedInfo.courierId);
        $('.editCourier #courierName').val(updatedInfo.courierName);
        $('.editCourier #courierPhone').val(updatedInfo.courierPhone);
        $('.editCourier #courierEmail').val(updatedInfo.courierEmail);
        $('.editCourier #courierPortal').val(updatedInfo.courierPortal);
        $('.editCourier #courierUser').val(updatedInfo.courierUser);
        $('.editCourier #courierPassword').val(updatedInfo.courierPassword);
        $('.editCourier #courierAddDetails').val(updatedInfo.courierAddDetails);
        $('#editCouriersModal').modal('toggle');
    }
    // Now dealing with the Payments
    function updateExpenses(data) {
        console.log(data);
        $('.editMoney #e_amount').val(data.e_amount);
        $('.editMoney #e_date').val(data.e_date);
        $('.editMoney #e_id').val(data.e_id);
        $('.editMoney #e_name').val(data.e_name);
        $('.editMoney #e_negative').val(data.e_negative);
        $('.editMoney #e_notes').val(data.e_notes);
        $('#editExpensesModal').modal('toggle');
    }

    // Deleting
    function deleteExpense(data) {
        let delConfirm = confirm("Are you Sure you want to delete this Payment!");
        if (delConfirm) {
            $('#delPayment [name="e_id"]').val(data);
            $('#delPayment').submit();
        }
    }
    // Employee functions below
    function updateEmployeeCredentials(credentials) {
        $('#editEmployeesCredentialsModal #uEf [name="user_id"]').val(credentials.user_id);
        $('#editEmployeesCredentialsModal').modal('toggle');
    }

    function updateEmployees(profile_details) {
        $('#editEmployeesModal #uEfF [name="user_email"]').val(profile_details.user_email);
        $('#editEmployeesModal #uEfF [name="user_id"]').val(profile_details.user_id);
        $('#editEmployeesModal #uEfF [name="user_name"]').val(profile_details.user_name);
        $('#editEmployeesModal #uEfF [name="user_phone"]').val(profile_details.user_phone);
        $('#editEmployeesModal #uEfF [name="user_role"]').val(profile_details.user_role);
        $('#editEmployeesModal #uEfF [name="user_salary"]').val(profile_details.user_salary);
        $('#editEmployeesModal').modal('toggle');
    }

    function deleteEmployee(employeeId) {
        let delConfirm = confirm("Are you Sure you want to delete this Employee!");
        if (delConfirm) {
            $('#delEmployee [name="user_id"]').val(employeeId);
            $('#delEmployee').submit();
        }
    }
    // Payroll functions 
    function updatePayrolls(payrollDetails) {
        $('#editPayrollsModal #uPF [name="p_allowance_bonus"]').val(payrollDetails.p_allowance_bonus);
        $('#editPayrollsModal #uPF [name="p_basic_salary"]').val(payrollDetails.p_basic_salary);
        $('#editPayrollsModal #uPF [name="p_date"]').val(payrollDetails.p_date);
        $('#editPayrollsModal #uPF [name="p_deduction_salary"]').val(payrollDetails.p_deduction_salary);
        $('#editPayrollsModal #uPF [name="p_emp"]').val(payrollDetails.p_emp);
        $('#editPayrollsModal #uPF [name="p_id"]').val(payrollDetails.p_id);
        $('#editPayrollsModal #uPF [name="p_note"]').val(payrollDetails.p_note);
        $('#editPayrollsModal').modal('toggle');
    }

    function deletePayroll(payroll_id) {
        let delConfirm = confirm("Are you Sure you want to delete this payroll record");
        if (delConfirm) {
            $('#delPayroll [name="payroll_id"]').val(payroll_id);
            $('#delPayroll').submit();
        }
    }
</script>