import axios from 'axios'
import React, {useState} from 'react'
import { useNavigate } from 'react-router-dom'

const endpoint = 'http://localhost:8000/api/product'

const CreateProduct = () => {
    const [nombreIndicador, setnombreIndicador] = useState('')
    const [codigoIndicador, setcodigoIndicador] = useState(0)
    const [unidadMedidaIndicador, setunidadMedidaIndicador] = useState(0)
    const [valorIndicador, setvalorIndicador] = useState(0)
    const [fechaIndicador, setfechaIndicador] = useState(0)
    const [origenIndicador, setorigenIndicador] = useState(0)
    
    const navigate = useNavigate()

    const store = async (e) => {
        e.preventDefault()
        await axios.post(endpoint, {
            nombreIndicador: nombreIndicador,
            codigoIndicador: codigoIndicador,
            unidadMedidaIndicador: unidadMedidaIndicador,
            valorIndicador: valorIndicador,
            fechaIndicador: fechaIndicador,
            origenIndicador: origenIndicador})
        navigate('/')
    }
    
  return (
    <div>
        <h3>Create Product</h3>
        <form onSubmit={store}>

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

            <button type='submit' className='btn btn-primary'>Store</button>
        </form>
    </div>
  )
}

export default CreateProduct