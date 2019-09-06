/*
* Calculating salary
* */
$(function () {
    const coefficient = 0.15;
    let product_cost = '';
    const salary_input = $('#salary');
    const button = $('#submit');

    $( "#department").change(function () {
        product_cost = $( "#department option:selected").val();

        switch (product_cost) {
            case '1':
                product_cost = '500';
                break;
            case '2':
                product_cost = '1000';
                break;
            case '3':
                product_cost = '1500';
                break;

        }

    });

    $('input').keyup(function () {
        let products_created = $('#produced-products').val();
        let salary = '';
        console.log(product_cost);
        console.log(products_created);

        salary = product_cost * products_created * coefficient;
        salary_input.val(salary);

        if (salary > 1500) {
            button.attr('disabled', true);
            alert("Salary salary can`t be more than 1500$");
        } else {
            button.attr('disabled', false);
        }
    });
});

$(function () {
    $("div.alert-success").delay(4000).hide();
});