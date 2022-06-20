@extends('layouts.app')
@section('title', 'Home')
@section('content')
    
<center><p class="display-5">Convert Files to PDF at one place!</p></center>
    <div class="row offset-md-4">
        <div class="col-md-12">
            <form action="{{ route('upload') }}" class="col-md-6" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}<br>
                <span class="text-danger">
                    @if (!empty($errormsg))
                        {{ $errormsg }}
                    @endif
                </span>
                <div class="row">
                <div class="col-md-6">
                    <label for="paperSize" class="form-label">Select A Paper</label>
                        <select class="form-select form-select-sm mb-3" name="paperSize" id="paperSize">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="a4">A4</option>
                            <option value="letter">Letter</option>
                            <option value="a0">A0</option>
                            <option value="a1">A1</option>
                            <option value="a2">A2</option>
                            <option value="a3">A3</option>
                          </select>
                    @error('paperSize')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="orientation" class="form-label">Select Orientation</label>
                        <select class="form-select form-select-sm mb-3" name="orientation" id="orientation">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="portrait">Portrait</option>
                            <option value="landscape">Landscape</option>

                          </select>
                    @error('paperSize')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select A File (.xlsx, docx, jpg, jpeg, png, gif Only)</label>
                    <input class="form-control" type="file" id="formFile" name="officeFile">
                    @error('officeFile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" name="submitPreview" class="btn btn-secondary" value="Convert & Preview"> 
                <input type="submit" name="submitDownload" class="btn btn-secondary" value="Convert & Download">
                {{-- <input type="submit" name="submitPreviewBrowser" class="btn btn-secondary" value="Preview"> --}}
            </form>
        </div>
    </div>
@endsection
