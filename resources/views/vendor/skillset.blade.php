@extends('layouts.vendor')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="text-info">My Skill Set  </h4>
                    </div>

                    <form method="POST" action="{{ route('vendor.updateskillset') }}">
                        @csrf
                        @method('PUT')
                        <table class="table table table-hover table-striped">
                            <tbody>

                                <tr> 
                                    <td>    <div class="checkbox">
                                        <input type="hidden" value="0" name="MP"> <input type="checkbox" onchange="this.form.submit()" id="MP" name="MP" value="1" {{ '1' ==old('MP', $viewskillset->MP  ) ? 'checked' : ' ' }}> 
                                        <label for="MP"></label>
                                    </div>
                                </td>
                                <td> Media Player and Screen Installation</td>
                            </tr>
                            <tr> 
                                <td>    <div class="checkbox">
                                    <input type="hidden" value="0" name="VW">  <input type="checkbox" onchange="this.form.submit()" id="VW" name="VW" value="1" {{ '1' ==old('VW', $viewskillset->VW  ) ? 'checked' : ' ' }}> 
                                    <label for="VW"></label>
                                </div>
                            </td>
                            <td> Videowall Installation</td>
                        </tr>
                        <tr> 
                            <td>    <div class="checkbox">
                                <input type="hidden" value="0" name="KIO"> <input type="checkbox" onchange="this.form.submit()" id="KIO" name="KIO" value="1" {{ '1' ==old('KIO', $viewskillset->KIO  ) ? 'checked' : ' ' }}> 
                                <label for="KIO"></label>
                            </div></td>
                            <td> Kiosk Installation</td>
                        </tr>
                        <tr> 
                            <td>    <div class="checkbox">  
                                <input type="hidden" value="0" name="LED">  <input type="checkbox" onchange="this.form.submit()" id="LED" name="LED" value="1" {{ '1' ==old('LED', $viewskillset->LED  ) ? 'checked' : ' ' }}>  
                                <label for="LED"></label>
                            </div></td>
                            <td> LED installation</td>
                        </tr>
                        <tr> 
                            <td>    <div class="checkbox">  
                                <input type="hidden" value="0" name="AUD"> <input type="checkbox" onchange="this.form.submit()" id="AUD" name="AUD" value="1" {{ '1' ==old('AUD', $viewskillset->AUD  ) ? 'checked' : ' ' }}>  
                                <label for="AUD"></label>
                            </div></td>
                            <td> Audio Equipment Installation</td>
                        </tr>
                        <tr> 
                            <td>    <div class="checkbox"> 
                                <input type="hidden" value="0" name="CAB"> <input type="checkbox" onchange="this.form.submit()" id="CAB" name="CAB" value="1" {{ '1' ==old('CAB', $viewskillset->CAB  ) ? 'checked' : ' ' }}>  
                                <label for="CAB"></label>
                            </div></td>
                            <td> Cabling (Non-Electrical)</td>
                        </tr>
                        <tr> 
                            <td>     <div class="checkbox">  
                                <input type="hidden" value="0" name="NDIA"> <input type="checkbox" onchange="this.form.submit()" id="NDIA" name="NDIA" value="1" {{ '1' ==old('NDIA', $viewskillset->NDIA  ) ? 'checked' : ' ' }}>
                                <label for="NDIA"></label> </div></td>
                                <td> Networking Device Installation and Administration</td>
                            </tr>
                            <tr> 
                                <td>     <div class="checkbox">  
                                    <input type="hidden" value="0" name="BPC"> <input type="checkbox"  onchange="this.form.submit()" id="BPC" name="BPC" value="1" {{ '1' ==old('BPC', $viewskillset->BPC  ) ? 'checked' : ' ' }}> 
                                    <label for="BPC"></label>
                                </div></td>
                                <td> Basic PC Skills</td>
                            </tr>
                            <tr> 
                                <td>    <div class="checkbox">  
                                    <input type="hidden" value="0" name="APC"> <input type="checkbox" onchange="this.form.submit()" id="APC" name="APC" value="1" {{ '1' ==old('APC', $viewskillset->APC  ) ? 'checked' : ' ' }}>  
                                    <label for="APC"></label>
                                </div></td>
                                <td> Advanced PC Skills</td>
                            </tr>
                            <tr> 
                                <td>    <div class="checkbox">  
                                    <input type="hidden" value="0" name="DAR"> <input type="checkbox"  onchange="this.form.submit()" id="DAR" name="DAR" value="1" {{ '1' ==old('DAR', $viewskillset->DAR  ) ? 'checked' : ' ' }}>  
                                    <label for="DAR"></label>
                                </div></td>
                                <td> Decommissioning and Relocation</td>
                            </tr>
                            <tr> 
                                <td>    <div class="checkbox">  
                                    <input type="hidden" value="0" name="EW"> <input type="checkbox" onchange="this.form.submit()" id="EW" name="EW" value="1" {{ '1' ==old('EW', $viewskillset->EW  ) ? 'checked' : ' ' }}>  
                                    <label for="EW"></label>
                                </div></td>
                                <td> Electrical Works</td>
                            </tr>
                            <tr> 
                                <td>    <div class="checkbox">  
                                    <input type="hidden" value="0" name="PROJ"> <input type="checkbox" onchange="this.form.submit()" id="PROJ" name="PROJ" value="1" {{ '1' ==old('PROJ', $viewskillset->PROJ  ) ? 'checked' : ' ' }}> 
                                    <label for="PROJ"></label></div></td>
                                    <td> Projector/Lamp installation and Troubleshooting</td>
                                </tr>
                                <tr> 
                                    <td>    <div class="checkbox">  
                                        <input type="hidden" value="0" name="STOR"> <input type="checkbox" onchange="this.form.submit()" id="STOR" name="STOR" value="1" {{ '1' ==old('STOR', $viewskillset->STOR  ) ? 'checked' : ' ' }}> 
                                        <label for="STOR"></label></div></td>
                                        <td> Storage</td>
                                    </tr>
                                    <tr> 
                                        <td>     <div class="checkbox">  
                                            <input type="hidden" value="0" name="DEL"> <input type="checkbox" onchange="this.form.submit()"  id="DEL" name="DEL" value="1" {{ '1' ==old('DEL', $viewskillset->DEL  ) ? 'checked' : ' ' }}> 
                                            <label for="DEL"></label> 
                                        </div></td>
                                        <td> Delivery</td>
                                    </tr>

                                    <tr> 
                                        <td>    <div class="checkbox">  
                                            <input type="hidden" value="0" name="RDIS"> <input type="checkbox" onchange="this.form.submit()"  id="RDIS" name="RDIS" value="1" {{ '1' ==old('RDIS', $viewskillset->RDIS  ) ? 'checked' : ' ' }}> <label for="RDIS"></label> </div></td>
                                            <td> Rubbish Disposal</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>         
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        @endsection

