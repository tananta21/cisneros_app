<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 09/09/2016
 * Time: 15:28
 */

namespace App\Core\Producto;

use App\Core\Contracts\BaseRepositoryInterface;
use DB;

class ProductoRepository implements BaseRepositoryInterface
{

    protected $producto;

    public function __construct()
    {
        $this->producto = new Producto();
    }

    public function all()
    {

    }
    public function todoProductos($tipo){
        return $this->producto
            ->whereRaw("tipo_producto_id ='" . $tipo . "' and estado = 1")
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function addProducto($inputs)
    {
        if($inputs['tipo_producto'] == 1){
            $producto = new Producto();
            $producto->tipo_producto_id = $inputs['tipo_producto'];
            $producto->categoria_id = $inputs['categoria'];
            $producto->modelo_id = $inputs['modelo'];
            $producto->serie = $inputs['serie'];
            $producto->nombre = $inputs['nombre'];
            $producto->precio = $inputs['precio'];
            $producto->stock_actual = $inputs['stock_actual'];
            $producto->stock_minimo = $inputs['stock_minimo'];
            $producto->stock_maximo = $inputs['stock_maximo'];
            $producto->descripcion = $inputs['descripcion'];
            $producto->estado = $inputs['estado'];
            $producto->save();
        }
        else{
            $producto = new Producto();
            $producto->tipo_producto_id = $inputs['tipo_producto'];
            $producto->categoria_id = 1;
            $producto->modelo_id =1;
            $producto->serie = $inputs['serie-servicio'];
            $producto->nombre = $inputs['nombre-servicio'];
            $producto->precio = $inputs['precio-servicio'];
            $producto->descripcion = $inputs['descripcion-servicio'];
            $producto->estado = $inputs['estado'];
            $producto->save();
        }

    }

    public function updated($id, array $attributes)
    {
        if($attributes['tipo_producto'] == 1){
            $producto = Producto::find($id);
            $producto->tipo_producto_id = 1;
            $producto->categoria_id = $attributes['categoria'];
            $producto->modelo_id = $attributes['modelo'];
            $producto->serie = $attributes['serie'];
            $producto->nombre = $attributes['nombre'];
            $producto->precio = $attributes['precio'];
            $producto->stock_actual = $attributes['stock_actual'];
            $producto->stock_minimo = $attributes['stock_minimo'];
            $producto->stock_maximo = $attributes['stock_maximo'];
            $producto->descripcion = $attributes['descripcion'];
            $producto->estado = $attributes['estado'];
            $producto->save();
        }
        else{
            $producto = Producto::find($id);
            $producto->tipo_producto_id = 2;
            $producto->categoria_id = 1;
            $producto->modelo_id =1;
            $producto->serie = $attributes['serie'];
            $producto->nombre = $attributes['nombre'];
            $producto->precio = $attributes['precio'];
            $producto->estado = $attributes['estado'];
            $producto->save();
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $producto = Producto::findOrFail($id);
        return $producto;
    }

//    cambiar de estado
    public function deleted($id)    {
        $registro = Producto::find($id);
        $registro->estado = 0;
        $registro->save();
    }

    public function buscarProducto($data)
    {
        return $this->producto
            ->serie($data['serie'])
            ->nombre($data['nombre'])
//            ->marca($data['marca'])
//            ->categoria($data['categoria'])
            ->modelo($data['modelo'])
            ->paginate(5);
    }

    public function busquedaProducto($tipo,$serie,$estado)
    {
        if(empty($serie)){
           return $this->producto->select('id', 'tipo_producto_id', 'categoria_id', 'modelo_id', 'serie', 'nombre','precio', 'estado')
               ->whereRaw("tipo_producto_id ='" . $tipo . "' and estado = '" . $estado . "'")
               ->orderBy('id', 'desc')
               ->get();
       }
        else{
            return $this->producto->select('id', 'tipo_producto_id', 'categoria_id', 'modelo_id', 'serie', 'nombre','precio', 'estado')
                ->whereRaw("tipo_producto_id ='" . $tipo . "' and serie = '" . $serie . "'or
                            tipo_producto_id ='" . $tipo . "' and nombre LIKE '" . $serie . "%' ")
                ->orderBy('id', 'desc')
                ->get();
        }


    }

    public function productoEnVentas($codigo, $tipo)
    {
        if (trim($codigo) != "") {
            return $this->producto->select('serie', 'nombre','precio','stock_actual','id')
                ->where('serie', $codigo)
                ->orWhere('nombre', 'like', "%$codigo%")
//                ->orWhere('tipo_producto_id', 'like', "%$tipo%")
                ->get();
        }
        return array();
    }


}