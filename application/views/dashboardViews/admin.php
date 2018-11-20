<div class="container">
    <div class="card">
        <div class="card-header card-header-warning">
            <h3 class="card-title">Administrador de usuarios</h3>
            <p>Lista de usuarios registrados</p>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="text-warning">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Cantidad de dispositivos
                        </th>
                        <th>
                            Inhabilitar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($userList as $value) {
                            echo '<tr>';
                            echo '<td>'.$value->id.'</td>';
                            echo '<td>'.$value->nombre.'</td>';
                            echo '<td>'.$value->dispositivos.'</td>';
                            if($value->id_estado == 7){
                                echo '
                                <td class="td-actions">
                                    <button id="'.$value->id.'" type="button" class="btn btn-danger btn-sm btnBan" rel="tooltip" data-placement="bottom" title="Inhabilitar usuario">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <button id="'.$value->id.'" type="button" class="btn btn-info btn-sm btnUnBan disabled" rel="tooltip" data-placement="bottom" title="Inhabilitar usuario">
                                        <i class="material-icons">done</i>
                                    </button>
                                </td>';
                            echo '</tr>';
                            }else{
                                echo '
                                <td class="td-actions">
                                    <button id="'.$value->id.'" type="button" class="btn btn-danger btn-sm btnBan disabled" rel="tooltip" data-placement="bottom" title="Inhabilitar usuario">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <button id="'.$value->id.'" type="button" class="btn btn-info btn-sm btnUnBan" rel="tooltip" data-placement="bottom" title="Inhabilitar usuario">
                                        <i class="material-icons">done</i>
                                    </button>
                                </td>';
                            echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>