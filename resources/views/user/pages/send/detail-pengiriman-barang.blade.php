@extends('user.layouts.app')
@section('content')
<div>
    <div class="card mb-8">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Detail Pengiriman Barang</h1>
        </div>
        <div class="card-body">
            <form>
                {{-- @method('PUT') --}}
                @csrf
                <div>
                    <label class="text-gray-700 ml-1">Nama Pengirim : </label>
                    {{-- <p class="ml-1 text-base">{{ $getDetailSend->user->name }}</p> --}}
                    <p class="ml-1 text-base">{{ $getDetailSend->user->name }}</p>
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">NIK Pengirim : </label>
                    <p class="ml-1 text-base">{{ $getNIKSender[0]->nik }}</p>
                    <div class="text-sm text-gray-900">
                        <img class="h-64 object-cover m-auto ml-1" src="{{asset('assets/upload/ktp/')}}/{{$getNIKSender[0]->ktp_photo}}">
                    </div>
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tujuan Tahanan : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->prisoner->name }}</p>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tanggal Pengiriman : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->date }}</p>
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Sesi : </label>
                    @if ($getDetailSend->session == 1)
                    <p class="ml-1 text-base">09.00 - 10.00</p>
                    @elseif($getDetailSend->session == 2)
                    <p class="ml-1 text-base">10.00 - 11.00</p>
                    @endif
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tipe Barang 1 : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->type1 }}</p>
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Deskripsi Barang 1 : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->desc1 }}</p>
                </div>
                @if ($getDetailSend->type2)  
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tipe Barang 2 : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->type2 }}</p>
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Deskripsi Barang 2 : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->desc2 }}</p>
                </div>
                @endif
                @if ($getDetailSend->type3)
                <div class="mt-3">
                  <label class="text-gray-700 ml-1">Tipe Barang 3 : </label>
                  <p class="ml-1 text-base">{{ $getDetailSend->type3 }}</p>
                </div>
                <div class="mt-3">
                  <label class="text-gray-700 ml-1">Deskripsi Barang 3 : </label>
                  <p class="ml-1 text-base">{{ $getDetailSend->desc3 }}</p>
                </div>
                @endif
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Status : </label>
                    <p class="ml-1 text-base">{{ $getDetailSend->status }}</p>
                </div>
                <div class="mt-5">
                    <a href="{{ url('/back-user/riwayat-pengiriman-barang') }}" class="btn-shadow" >Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('extraJS')
<script>
    logos.onchange = evt => {
        const [file] = logos.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("logos").value.split("\\").pop();
        }
    }
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

  berkas_cutis.onchange = evt => {
        const [file] = berkas_cutis.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("berkas_cutis").value.split("\\").pop();
        }
    }
</script>
@endsection