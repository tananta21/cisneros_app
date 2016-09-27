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
        return $this->producto
            ->orderBy('id', 'desc')
            ->paginate(4);
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
        $producto = new Producto();
        $producto->tipo_producto_id = $inputs['tipo_producto'];
        $producto->categoria_id = $inputs['categoria'];
        $producto->marca_id = $inputs['marca'];
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

    public function updated($id, array $attributes)
    {
        $producto = Producto::find($id);
        $producto->tipo_producto_id = $attributes['tipo_producto'];
        $producto->categoria_id = $attributes['categoria'];
        $producto->marca_id = $attributes['marca'];
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

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $producto = Producto::findOrFail($id);
        return $producto;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id)
    {
        $this->producto->destroy($id);
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

    public function busquedaProducto($nombre, $serie, $categoria, $marca, $modelo)
    {

        return $this->producto->select('id', 'tipo_producto_id', 'marca_id', 'categoria_id', 'modelo_id', 'serie', 'nombre', 'estado')
//                ->where('serie',$serie)
//                ->orwhere('nombre', 'like', "%$nombre%")
//                ->orWhere('categoria_id','like',"$categoria")
//                ->orWhere('modelo_id','like',"$modelo")
            ->whereRaw(" nombre = '" . $nombre . "'
                                OR serie = '" . $serie . "'
                                OR categoria_id ='" . $categoria . "'
                                OR marca_id ='" . $marca . "'
                                OR modelo_id = '" . $modelo . "'")
            ->orderBy('id', 'desc')
            ->paginate(4);

//        $result =DB::table('productos')
//                    ->selectRaw("productos.id,serie,nombre ,categorias.descripcion, marca_id, modelo_id, estado")
//                    ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
//                     ->whereRaw("nombre = '".$nombre."'
//                                OR serie = '".$serie."'
//                                OR categoria_id ='".$categoria."'
//                                OR modelo_id = '".$modelo."'")
//                    ->paginate(5);


//        return $result;

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