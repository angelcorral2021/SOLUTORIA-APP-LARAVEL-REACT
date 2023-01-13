import axios from "axios";
import React, {useState, useEffect} from "react";
import { useNavigate, useParams } from "react-router-dom";

const endpoint = 'http://localhost:8000/api/product/'

const EditProduct = () => {
    const [nombreIndicador, setnombreIndicador] = useState('')
    const [codigoIndicador, setcodigoIndicador] = useState(0)
    const [unidadMedidaIndicador, setunidadMedidaIndicador] = useState(0)
    const [valorIndicador, setvalorIndicador] = useState(0)
    const [fechaIndicador, setfechaIndicador] = useState(0)
    const [tiempoIndicador, settiempoIndicador] = useState(0)
    const [origenIndicador, setorigenIndicador] = useState(0)

    
    const navigate = useNavigate()
    const {id} = useParams()

    const update = async (e) => {
        e.preventDefault()
        await axios.put(`${endpoint}${id}`, {
            id:id,
            nombreIndicador: nombreIndicador,
            codigoIndicador: codigoIndicador,
            unidadMedidaIndicador: unidadMedidaIndicador,
            valorIndicador: valorIndicador,
            fechaIndicador: fechaIndicador,
            tiempoIndicador: tiempoIndicador,
            origenIndicador: origenIndicador

        })
        navigate('/')
    }
    
    useEffect( () =>{
        const getProductById = async () => {
            const response = await axios.get(`${endpoint}${id}`)
            
            setnombreIndicador(response.data.nombreIndicador)
            setcodigoIndicador(response.data.codigoIndicador)
            setunidadMedidaIndicador(response.data.unidadMedidaIndicador)
            setvalorIndicador(response.data.valorIndicador)
            setfechaIndicador(response.data.fechaIndicador)
            settiempoIndicador(response.data.tiempoIndicador)
            setorigenIndicador(response.data.origenIndicador)
        }
        getProductById()
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [] )

    return (
        <div>
        <h3>Edit Product</h3>
        <form onSubmit={update}>
            
            <div className='mb-3'>
                <label className='form-label'>nombreIndicador</label>
                <input 
                    value={nombreIndicador}
                    onChange={ (e)=> setnombreIndicador(e.target.value)}
                    type='text'
                    className='form-control'
                />
            </div>

            <div className='mb-3'>
                <label className='form-label'>codigoIndicador</label>
                <input 
                    value={codigoIndicador}
                    onChange={ (e)=> setcodigoIndicador(e.target.value)}
                    type='text'
                    className='form-control'
                />
            </div>

            <div className='mb-3'>
                <label className='form-label'>unidadMedidaIndicador</label>
                <input 
                    value={unidadMedidaIndicador}
                    onChange={ (e)=> setunidadMedidaIndicador(e.target.value)}
                    type='text'
                    className='form-control'
                />
            </div>

            <div className='mb-3'>
                <label className='form-label'>valorIndicador</label>
                <input 
                    value={valorIndicador}
                    onChange={ (e)=> setvalorIndicador(e.target.value)}
                    type='number'
                    className='form-control'
                />
            </div>

            <div className='mb-3'>
                <label className='form-label'>fechaIndicador</label>
                <input 
                    value={fechaIndicador}
                    onChange={ (e)=> setfechaIndicador(e.target.value)}
                    type='text'
                    className='form-control'
                />
            </div>

           

            <div className='mb-3'>
                <label className='form-label'>origenIndicador</label>
                <input 
                    value={origenIndicador}
                    onChange={ (e)=> setorigenIndicador(e.target.value)}
                    type='text'
                    className='form-control'
                />
            </div>


            <button type='submit' className='btn btn-primary'>Update</button>
        </form>
    </div>
    )
}

export default EditProduct
