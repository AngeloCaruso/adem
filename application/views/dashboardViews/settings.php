<h1>Settings</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Información del dispositivo</h4>
                    <p class="card-category">Personaliza tu dispositivo</p>
                </div>
                <form>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">tablet_android</i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Nombre del dispositivo" autocomplete="off">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">access_time</i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Intervalo de envío de datos"
                                autocomplete="off">
                        </div>
                        <div class="input-group">
                            <select class="form-control" id="selectDevice">
                                <option value="">Aire acondicionado</option>
                                <option value="">Nevera</option>
                                <option value="">Televisor</option>
                                <option value="">Lavadora</option>
                                <option value="">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 mt-auto mb-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">el wiwi</h4>
                    <p class="card-category">Conecta tu medidor a otra red</p>
                </div>
                <form>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">network_wifi</i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Nombre de la red" autocomplete="off">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Contraseña" autocomplete="off">
                        </div>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>