document.addEventListener('DOMContentLoaded', function() {
    let brand = document.querySelector('#brand');
    let model = document.querySelector('#model');
    let options = Array.from(model.querySelectorAll('option'));

    function updateModels(selectedBrand) {
        let fragment = document.createDocumentFragment();

        model.disabled = !selectedBrand;

        if (!selectedBrand) {
            model.innerHTML = ''; 
            model.disabled = true;
            return;
        }

        let allModelsOption = document.createElement('option');
        allModelsOption.value = '';
        allModelsOption.textContent = 'All Models';
        fragment.appendChild(allModelsOption);

        options.forEach(option => {
            if (option.dataset.option === selectedBrand) {
                fragment.appendChild(option.cloneNode(true));
            }
        });

        model.innerHTML = '';
        model.appendChild(fragment);
    }

    brand.addEventListener('change', function() {
        updateModels(brand.value);
    });

    updateModels(brand.value);
});

document.querySelector("#show_password").addEventListener('change', () => {
    let password = document.querySelector("#password");
    let checkbox = document.querySelector("#show_password");
    password.type = checkbox.checked ? "text" : "password";
});