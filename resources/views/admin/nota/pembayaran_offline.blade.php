@extends('app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nota /</span> Pembayaran</h4>
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h5 class="fw-bold">Data Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bisaeditt', $nota->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group mt-3">
                                <label for="">Status</label>
                                <select name="updateStatus" class="form-control">
                                    <?php old('status', $nota->status); ?>
                                    <option {{ $nota->status == 'Lunas' ? 'selected' : '' }} value="Lunas">Lunas</option>
                                    <option {{ $nota->status == 'Belum_Lunas' ? 'selected' : '' }} value="Belum_Lunas">
                                        Belum_Lunas</option>
                                </select>
                                <!-- error message untuk harga_barang -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Total Biaya
                                    {{-- </label>
                                    <label for="" class="form-label">{{$nota->id->total}} --}}
                                </label>
                                <input id="total" type="text" class="form-control" value="{{ $total }}"
                                    readonly>

                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Jumlah Uang
                                    {{-- </label>
                                    <label for="" class="form-label">{{$nota->id->total}} --}}
                                </label>
                                <input id="bayar" type="text" class="form-control" value="">

                            </div>

                            <div class="mt-3"></div>
                            <a class="btn btn-md btn-primary text-white" data-bs-toggle="modal"
                                data-bs-target="#resultModal" onclick="calculateSubtraction()">SIMPAN</a>
                            <a href="{{ url('nota') }}" class="btn btn-md btn-dark">Kembali</a>
                            <div class="modal fade" id="resultModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Update Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!--FORM UPDATE BARANG-->
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="" class="form-label">Total Kembalian
                                                        {{-- </label>
                                                            <label for="" class="form-label">{{$d->id->total}} --}}
                                                    </label>
                                                    <p>Hasil Pengurangan:</p>
                                                    <p id="resultValue"></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal UPDATE Barang-->
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>


    <script>
        const total = document.getElementById('total');
        const bayar = document.getElementById('bayar');
        const resultValue = document.getElementById('resultValue');
        const resultModal = document.getElementById('resultModal');

        function calculateSubtraction() {
            const value1 = parseFloat(total.value) || 0;
            const value2 = parseFloat(bayar.value) || 0;
            const subtraction = value2 - value1;

            resultValue.textContent = subtraction;
        }
    </script>
@endsection
