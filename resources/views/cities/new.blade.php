@extends('template.fullpainel')
@section('content')
<div class="form-center">
    <form action="{{ route('cities.save') }}" method="post" class="transaction-form form-control form-control-sm p-3">
        @csrf
        <div class="text-center mb-1 mt-3">
            <img src="{{ asset('img/icon/cities.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Registrar Cidade</h4>
        <div class="mb-3">
            <label for="country" class="form-label">País</label>
            <select class="form-select @error('country') is-invalid @enderror" id="country" name="country" required></select>
            @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <select class="form-select @error('state') is-invalid @enderror" id="state" name="state" required></select>
            @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <select class="form-select @error('name') is-invalid @enderror" id="city" name="name" required></select>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar"></button>
    </form>
</div>
@endsection

@push('painel-scripts')
<script>
        const baseURL = 'https://countriesnow.space/api/v0.1/';
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');
        let allCountries = [];

        function loadCities(countryName, stateName) {
            fetch(`${baseURL}countries/state/cities`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    country: countryName,
                    state: stateName
                })
            })
            .then(response => response.json())
            .then(data => {
                const cities = data.data;
                citySelect.innerHTML = '<option value="">Selecione a cidade</option>';
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Erro ao carregar cidades:', error);
                addNotify('error', 'Erro ao carregar cidades!');
            });
        }

        fetch(`${baseURL}countries/states`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            allCountries = data.data;
            countrySelect.innerHTML = '<option value="">Selecione o país</option>';

            allCountries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name;
                option.textContent = country.name;
                if (country.name === 'Brazil') {
                    option.selected = true;
                }
                countrySelect.appendChild(option);
            });

            countrySelect.dispatchEvent(new Event('change'));
        })
        .catch(error => {
            console.error('Erro ao carregar países:', error);
            addNotify('error', 'Erro ao carregar países!');
        });

        countrySelect.addEventListener('change', () => {
            const selectedCountry = countrySelect.value;
            const countryData = allCountries.find(c => c.name === selectedCountry);
            stateSelect.innerHTML = '<option value="">Selecione o estado</option>';
            citySelect.innerHTML = '<option value="">Selecione a cidade</option>';

            if (countryData) {
                countryData.states.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.name;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });

                if (countryData.states.length > 0) {
                    stateSelect.value = countryData.states[0].name;
                    loadCities(selectedCountry, stateSelect.value);
                }
            }
        });

        stateSelect.addEventListener('change', () => {
            const selectedCountry = countrySelect.value;
            const selectedState = stateSelect.value;
            if (selectedCountry && selectedState) {
                loadCities(selectedCountry, selectedState);
            }
        });

</script>
@endpush