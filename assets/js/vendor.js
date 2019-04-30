$(document).ready(function () {

    const vendorSelect = document.querySelector('#category');
    const vendorAddress = document.querySelector('#vendor');

    vendorSelect.addEventListener('change', function (event) {

        let currentElement = event.currentTarget;
        let vendorId = currentElement.value;

        if (vendorId != 0) {
            console.log(vendorId);
            fetch(`/vendors/${vendorId}`)
                .then(response => {
                    return response.json();
                })
                .then(json => {
                    showVendor(json);
                })
        }

        vendorAddress.innerHTML = '';

    });

    function showVendor(json) {

        if (json.success) {

            let vendor = json.vendor;

            let vendorAddressHtml = `<p>Products in ${vendor.category} are shipped to:</p>
                <address>
                    <strong>Buc-ee's</strong><br>
                    <strong>Attn: Buyer for ${vendor.category}</strong><br>

                    ${vendor.addr_line_1}<br>
                    ${vendor.addr_line_2 ? vendor.addr_line_2 + '<br >' : ''}
                    ${vendor.addr_city_state_zip}
                </address>`;

            vendorAddress.innerHTML = vendorAddressHtml;
        } else {
            vendorAddress.innerHTML = '';
        }

    }

});
