<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vaccine Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="" method="get">
                        <div class="pt-6 mb-6 text-gray-900 dark:text-gray-100">
                            <x-input-label for="options" :value="__('Search By:')" />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="options" id="option1" value="nid" {{ request()->get('options', 'nid') == 'nid' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="option1">National ID</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="options" id="option2" value="phone" {{ request()->get('options') == 'phone' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="option2">Phone Number</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="options" id="option3" value="email" {{ request()->get('options') == 'email' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="option3">Email</label>
                            </div>
                        </div>
                        <x-text-input class="numeric" id="query" name="query" type="text" maxlength="17" minlength="17" required value="{{ request()->get('query') }}" placeholder="Search by National ID" style="display:block; width:100% !important;" />
                        <x-input-error :messages="$errors->get('query')" class="mt-2" />
                        <div id="error" class=""></div>
                        <x-button id="submit" type="submit">Submit</x-button>
                    </form>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100" style="text-align:center; ali">
                    @if(isset($results))
                        @if($results->count())
                            @foreach ($results as $result)
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <b>Status: </b>{{ $result->registration->formatted_status }}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><b>Name: </b>{{ $result->name }}</li>
                                            <li class="list-group-item"><b>NID: </b>{{ $result->nid }}</li>
                                            <li class="list-group-item"><b>Phone: </b>{{ $result->phone }}</li>
                                            <li class="list-group-item"><b>Email: </b>{{ $result->email }}</li>
                                            <li class="list-group-item"><b>Center: </b>{{ $result->registration->vaccineCenter->name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        @else
                            @if(request()->get('query'))
                                <p>{{ request()->get('query') }} is not Registered</p>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('input[type=radio][name=options]').change(function() {
    var inputField = $('#query');
    var button = $('#submit');
    button.removeAttr('disabled');
    $('#query').val("");

    if (this.value === 'nid') {
      inputField.attr('placeholder', 'Search by National ID');
      inputField.attr('type', 'text');
      inputField.attr('maxlength', 17);
      inputField.attr('minlength', 17);
      inputField.addClass('numeric');
    } else if (this.value === 'phone') {
      inputField.attr('placeholder', 'Search by Phone Number');
      inputField.attr('maxlength', 11);
      inputField.attr('minlength', 11);
      inputField.attr('type', 'text');
      inputField.addClass('numeric');
    } else if (this.value === 'email') {
      inputField.attr('placeholder', 'Search by Email');
      inputField.attr('type', 'email');
      inputField.removeClass('numeric');
      inputField.removeAttr('maxlength');
      inputField.removeAttr('minlength');
    }
  });

  $('.numeric').on('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    // Check for minlength and maxlength
    var minLength = $(this).attr('minlength');
    var maxLength = $(this).attr('maxlength');
    var errorMessage = $('#error');
    var button = $('#submit');

    if (minLength && this.value.length < minLength) {
      errorMessage.text(`Minimum length is ${minLength}.`).show();
      button.attr('disabled', 'disabled');
    } else if (maxLength && this.value.length > maxLength) {
      errorMessage.text(`Maximum length is ${maxLength}.`).show();
      button.attr('disabled', 'disabled');
    } else {
      errorMessage.hide();
      button.removeAttr('disabled');
    }
  });
});

</script>
