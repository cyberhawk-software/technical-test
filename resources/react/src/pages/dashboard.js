import AppLayout from '@/components/Layouts/AppLayout'
import Head from 'next/head'
import Table from '@/components/Table'
import { useCallback, useEffect, useReducer, useState } from 'react'
import axios from '@/lib/axios'
import { getFilteredParams } from '@/lib/utils'

const Dashboard = (callback, deps) => {
    const reducer = (obj, value) => ({ ...obj, ...value })
    const [paginator, setPaginator] = useReducer(reducer, {
        page: 1,
        limit: 15,
        orderBy: 'id',
        sortBy: 'asc',
        filters: [],
    })
    const [pagination, setPagination] = useReducer(reducer, {})
    const [items, setData] = useState([])

    const useFetch = ({ page, limit, orderBy, sortBy, filters }) => {
        axios
            .get('/api/turbines', {
                params: getFilteredParams(page, filters, limit, {
                    orderBy,
                    sortBy,
                }),
            })
            .then(values => {
                if (!values.data) return

                const {
                    data,
                    current_page,
                    last_page,
                    links,
                    per_page,
                    total,
                    from,
                    to,
                } = values.data
                setData(data)
                setPagination({
                    current_page,
                    last_page,
                    links,
                    per_page,
                    total,
                    from,
                    to,
                })
            })
            .catch(error => {
                console.error(error)
            })
    }

    useEffect(() => {
        useFetch(paginator)
    }, [])

    useEffect(() => {
        useFetch(paginator)
    }, [paginator])

    return (
        <AppLayout
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Turbine Inspections
                </h2>
            }>
            <Head>
                <title>Cyberhawk - Dashboard</title>
            </Head>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <Table
                        items={items}
                        pagination={pagination}
                        onChangePage={value => setPaginator({ ...value })}
                        onSearch={value => setPaginator({ filters: value })}
                    />
                </div>
            </div>
        </AppLayout>
    )
}

export default Dashboard
