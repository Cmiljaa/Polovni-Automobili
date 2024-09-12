document.addEventListener('DOMContentLoaded', function() {
    let brand = document.querySelector('#brand');
    let model = document.querySelector('#model');
    let options = Array.from(model.querySelectorAll('option')); // Convert NodeList to Array

    function updateModels(selectedBrand) {
        var fragment = document.createDocumentFragment();

        model.disabled = !selectedBrand; // Enable/Disable model dropdown based on brand selection

        if (!selectedBrand) {
            // If no brand selected, clear and disable model dropdown
            model.innerHTML = ''; 
            model.disabled = true;
            return;
        }

        // Append models that match the selected brand
        options.forEach(option => {
            if (option.dataset.option === selectedBrand) {
                fragment.appendChild(option.cloneNode(true)); // Use cloneNode to avoid moving options
            }
        });

        model.innerHTML = ''; // Clear existing options
        model.appendChild(fragment); // Append filtered options
    }

    brand.addEventListener('change', function() {
        updateModels(brand.value);
    });

    // Optional: Automatically trigger selection if a brand is already selected
    updateModels(brand.value);
});