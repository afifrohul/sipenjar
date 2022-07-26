@extends('user.layouts.app')
@section('content')
<div>
    <div class="card mb-8">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Tambah Pengiriman Barang</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/back-user/pengiriman-barang/store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                  <div class="alert alert-default alert-close mb-5 mx-auto bg-yellow-100 border-t-4 border-yellow-600 mt-4">
                    <div class="flex w-full justify-start items-center">
                      <div class="mx-4">
                          <div class="inline-flex items-center bg-yellow-600 p-2 text-white text-sm rounded-full flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-exclamation-lg w-5 h-5" viewBox="0 0 16 16">
                                  <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                              </svg>
                          </div>
                      </div>
                      <div class="mx-4">
                        <h1 class="font-bold leading-5 capitalize  text-gray-700">
                            Peraturan Pengiriman Barang :
                        </h1>
                        <p class="text-gray-700">1. Tidak membawa nasi dan lauk lebih dari tiga (3) porsi/bungkus.</p>
                        <p class="text-gray-700">2. Tidak membawa barang/makanan dalam kemasan/bungkus pabrik kecuali dipindah ke plastik transparan, untuk seluruh barang kemasan pabrik (jumlah dibatasi 3 sachet).</p>
                        <p class="text-gray-700">3. Tidak membawa buah utuh kecuali sudah di kupas dan di potong-potong (maksimal 1 bungkus plastik ukuran 250gr).</p>
                        <p class="text-gray-700">4. Tidak membawa tembakau/rokok lebih dari 1 bungkus (untuk tembakau/rokok maksimal 1 bungkus plastik ukuran 250gr).</p>
                        <p class="text-gray-700">5. Tidak membawa sayuran mentah. (cabe, tomat, dan sayur lalapan).</p>
                        <p class="text-gray-700">6. Tidak membawa pakaian kecuali bagi tahanan baru.</p>
                        <p class="text-gray-700">7. Tidak boleh membawa kacang kulit.</p>
                        <p class="text-gray-700">8. Tidak membawa narkoba dan obat obatan tanpa resep dokter.</p>
                        <p class="text-gray-700">9. Tidak membawa hp atau barang elektronik.</p>
                        <p class="text-gray-700">10. Tidak membawa senjata tajam dan senjata api</p>
                        <p class="text-gray-700">11. Tidak boleh membawa berbagai macam olahan tahu baik sayur dan lauk.</p>
                        <p class="text-gray-700"></p>
                    </div>  
                  </div>
                </div>
                <div>
                    <label class="text-gray-700 ml-1">Tujuan Tahanan : </label>
                    <select id="pilih_tahanan" placeholder="Cari Nama / No Registrasi Tahanan" name="id_prisoner" class="form-input mt-1 p-3 border-2 @error('tag') border-red-500 @enderror focus:outline-none focus:border-teal-500 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0">

                      <option value="">Cari Nama / No Registrasi Tahanan</option>
                      @foreach ($getPrisoner as $item)
                      <option value="{{ $item->id }}">{{ $item->no_regis }} - {{ $item->name }}</option>
                          
                      @endforeach
                    </select>
                    @error('id_prisoner')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tanggal Pengiriman : </label>
                    <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                        <div class="container mx-auto">
                          <div>
                            <div class="relative">
                              <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                              <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" class="form-input w-full block rounded mt-1 p-3 border-2 @error('date') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Select date" readonly />
                    
                              <div class="absolute top-0 right-0 p-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                              </div>                    
                              <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0 z-50" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                <div class="flex justify-between items-center mb-2">
                                  <div>
                                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                  </div>
                                  <div>
                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 0) {
                                                                    year--;
                                                                    month = 12;
                                                                } month--; getNoOfDays()">
                                      <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                      </svg>
                                    </button>
                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 11) {
                                                                    month = 0; 
                                                                    year++;
                                                                } else {
                                                                    month++; 
                                                                } getNoOfDays()">
                                      <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                      </svg>
                                    </button>
                                  </div>
                                </div>
                    
                                <div class="flex flex-wrap mb-3 -mx-1">
                                  <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-0.5">
                                      <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                                    </div>
                                  </template>
                                </div>
                    
                                <div class="flex flex-wrap -mx-1">
                                  <template x-for="blankday in blankdays">
                                    <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
                                  </template>
                                  <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%" class="px-1 mb-1">
                                      <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100" :class="{
                                          'bg-indigo-200': isToday(date) == true, 
                                          'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                          'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                        }"></div>
                                    </div>
                                  </template>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    
                    @error('date')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tipe Barang 1 : </label>
                    <select name="type1" class="form-input mt-1 p-3 border-2 @error('type1') border-red-500 @enderror focus:outline-none focus:border-teal-500 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0">
                        <option value={{ null }}>--Pilih Jenis--</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="pakaian">Pakaian</option>
                    </select>
                    @error('type1')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 ml-1">Deskripsi 1 : </label>
                    <input type="text" name="desc1" class="form-input w-full block rounded mt-1 p-3 border-2 @error('desc1') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="" value="{{old('desc1')}}">
                    @error('desc1')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tipe Barang 2 : </label>
                    <select name="type2" class="form-input mt-1 p-3 border-2 @error('type2') border-red-500 @enderror focus:outline-none focus:border-teal-500 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0">
                        <option value={{ null }}>--Pilih Jenis (Kosongi jika hanya mengirimkan 1 jenis barang)--</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="pakaian">Pakaian</option>
                    </select>
                    @error('type2')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 ml-1">Deskripsi 2 : </label>
                    <input type="text" name="desc2" class="form-input w-full block rounded mt-1 p-3 border-2 @error('desc2') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="" value="{{old('desc2')}}">
                    @error('desc2')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tipe Barang 3 : </label>
                    <select name="type3" class="form-input mt-1 p-3 border-2 @error('type3') border-red-500 @enderror focus:outline-none focus:border-teal-500 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0">
                        <option value={{ null }}>--Pilih Jenis (Kosongi jika hanya mengirimkan 2 jenis barang)--</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="pakaian">Pakaian</option>
                    </select>
                    @error('type3')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 ml-1">Deskripsi 3 : </label>
                    <input type="text" name="desc3" class="form-input w-full block rounded mt-1 p-3 border-2 @error('desc3') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="" value="{{old('desc3')}}">
                    @error('desc3')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn-shadow">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('extraJS')
<script>
  $(document).ready(function () {
      $('#pilih_tahanan').selectize({
          sortField: 'text'
      });
  });
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script>
    const MONTH_NAMES = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    const MONTH_SHORT_NAMES = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ];
    const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    function app() {
      return {
        showDatepicker: false,
        datepickerValue: '',
        dateFormat: "DD-MM-YYYY",
        month: '',
        year: '',
        no_of_days: [],
        blankdays: [],
        initDate() {
          let today;
          if (this.selectedDate) {
            today = new Date(Date.parse(this.selectedDate));
          } else {
            today = new Date();
          }
          this.month = today.getMonth();
          this.year = today.getFullYear();
          this.datepickerValue = this.formatDateForDisplay(
            today
          );
        },
        formatDateForDisplay(date) {
          let formattedDay = DAYS[date.getDay()];
          let formattedDate = ("0" + date.getDate()).slice(
            -2
          ); // appends 0 (zero) in single digit date
          let formattedMonth = MONTH_NAMES[date.getMonth()];
          let formattedMonthShortName =
            MONTH_SHORT_NAMES[date.getMonth()];
          let formattedMonthInNumber = (
            "0" +
            (parseInt(date.getMonth()) + 1)
          ).slice(-2);
          let formattedYear = date.getFullYear();
          if (this.dateFormat === "DD-MM-YYYY") {
            return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
          }
          if (this.dateFormat === "YYYY-MM-DD") {
            return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
          }
          if (this.dateFormat === "D d M, Y") {
            return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
          }
          return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
          const d = new Date(this.year, this.month, date);
          return this.datepickerValue ===
            this.formatDateForDisplay(d) ?
            true :
            false;
        },
        isToday(date) {
          const today = new Date();
          const d = new Date(this.year, this.month, date);
          return today.toDateString() === d.toDateString() ?
            true :
            false;
        },
        getDateValue(date) {
          let selectedDate = new Date(
            this.year,
            this.month,
            date
          );
          this.datepickerValue = this.formatDateForDisplay(
            selectedDate
          );
          // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
          this.isSelectedDate(date);
          this.showDatepicker = false;
        },
        getNoOfDays() {
          let daysInMonth = new Date(
            this.year,
            this.month + 1,
            0
          ).getDate();
          // find where to start calendar day of week
          let dayOfWeek = new Date(
            this.year,
            this.month
          ).getDay();
          let blankdaysArray = [];
          for (var i = 1; i <= dayOfWeek; i++) {
            blankdaysArray.push(i);
          }
          let daysArray = [];
          for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
          }
          this.blankdays = blankdaysArray;
          this.no_of_days = daysArray;
        },
      };
    }
</script>
@endsection