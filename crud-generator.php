


php artisan crud:generate Proveedor --fields="nombre#string; telefono#string; embarcacion#string; referencia#string;" --view-path=proveedor --controller-namespace=Proveedor --route-group=proveedor


php artisan crud:generate Bitacora --fields="anticipoEntrada#string; fecha#string; proveedor_id#string;" --view-path=bitacora --controller-namespace=Bitacora --route-group=bitacora




php artisan crud:generate Viver --fields="nombre#string; cantidad#string; anticipo#string; fecha#string; provedor_id#string; bitacora_id#string;" --view-path=viver --controller-namespace=Viver --route-group=viver



php artisan crud:generate Historla --fields="fecha#string; cantidad#string; precio#string; importe#string; viver_id#string; proveedor_id#string; status_id#string;" --view-path=historial --controller-namespace=Historla --route-group=historial



php artisan crud:generate Status --fields="status#string;" --view-path=status --controller-namespace=Status --route-group=status


php artisan crud:generate Bitacoras --fields="anticipoEntrada#string; fecha#string; proveedor_id#string;" --view-path=bitacoras --controller-namespace=Bitacoras --route-group=bitacoras


php artisan crud:generate Producto --fields="nombre#string; proveedor_id#string;" --view-path=producto --controller-namespace=Producto --route-group=producto





php artisan crud:generate Historiales --fields="fecha#string; cantidad#string; precio#string; importe#string; viver_id#string; proveedor_id#string; status_id#string;" --view-path=historiales --controller-namespace=Historiales --route-group=historiales


php artisan crud:generate Viveres --fields="nombre#string; cantidad#string; anticipo#string; fecha#string; provedor_id#string; bitacora_id#string;" --view-path=viveres --controller-namespace=Viveres --route-group=viveres