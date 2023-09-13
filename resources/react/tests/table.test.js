import '@testing-library/jest-dom'
import { render, screen } from '@testing-library/react'

describe('Table component', () => {
    // Tests that the table is rendered with the correct headers and data
    it('should render the table with correct headers and data', () => {
        const items = [
            {
                id: 1,
                name: 'Turbine 1',
                components: [
                    {
                        id: 1,
                        name: 'Component 1',
                        pivot: {
                            rating: 3,
                        },
                    },
                ],
            },
        ]
        const pagination = {
            current_page: 1,
            last_page: 1,
        }
        const onChangePage = jest.fn()
        const onSearch = jest.fn()
        render(
            <Table
                items={items}
                pagination={pagination}
                onChangePage={onChangePage}
                onSearch={onSearch}
            />,
        )
        expect(screen.getByText('Turbine')).toBeInTheDocument()
        expect(screen.getByText('Components')).toBeInTheDocument()
        expect(screen.getByText('Action')).toBeInTheDocument()
        expect(screen.getByText('Turbine 1')).toBeInTheDocument()
        expect(screen.getByText('Qtd of components: 1')).toBeInTheDocument()
    })

    // Tests that clicking on a row shows the components of the turbine
    it('should show the components of the turbine when clicking on a row', () => {
        const items = [
            {
                id: 1,
                name: 'Turbine 1',
                components: [
                    {
                        id: 1,
                        name: 'Component 1',
                        pivot: {
                            rating: 3,
                        },
                    },
                ],
            },
        ]
        const pagination = {
            current_page: 1,
            last_page: 1,
        }
        const onChangePage = jest.fn()
        const onSearch = jest.fn()
        render(
            <Table
                items={items}
                pagination={pagination}
                onChangePage={onChangePage}
                onSearch={onSearch}
            />,
        )
        fireEvent.click(screen.getByText('Turbine 1'))
        expect(screen.getByText('Component 1')).toBeInTheDocument()
    })

    // Tests that clicking on the edit button shows the ratings of the components
    it('should show the ratings of the components when clicking on the edit button', () => {
        const items = [
            {
                id: 1,
                name: 'Turbine 1',
                components: [
                    {
                        id: 1,
                        name: 'Component 1',
                        pivot: {
                            rating: 3,
                        },
                    },
                ],
            },
        ]
        const pagination = {
            current_page: 1,
            last_page: 1,
        }
        const onChangePage = jest.fn()
        const onSearch = jest.fn()
        render(
            <Table
                items={items}
                pagination={pagination}
                onChangePage={onChangePage}
                onSearch={onSearch}
            />,
        )
        fireEvent.click(screen.getByText('Edit'))
        expect(screen.getByText('Has Something Wrong')).toBeInTheDocument()
    })

    // Tests that the pagination buttons change the active page and fetch new data
    it('should change the active page and fetch new data when clicking on pagination buttons', () => {
        const items = [
            {
                id: 1,
                name: 'Turbine 1',
                components: [
                    {
                        id: 1,
                        name: 'Component 1',
                        pivot: {
                            rating: 3,
                        },
                    },
                ],
            },
        ]
        const pagination = {
            current_page: 1,
            last_page: 5,
        }
        const onChangePage = jest.fn()
        const onSearch = jest.fn()
        render(
            <Table
                items={items}
                pagination={pagination}
                onChangePage={onChangePage}
                onSearch={onSearch}
            />,
        )
        fireEvent.click(screen.getByText('2'))
        expect(onChangePage).toHaveBeenCalledWith({ page: 2 })
    })

    // Tests that searching by name, component name, or rate filters the data correctly
    it('should filter the data correctly when searching by name, component name, or rate', () => {
        const items = [
            {
                id: 1,
                name: 'Turbine 1',
                components: [
                    {
                        id: 1,
                        name: 'Component 1',
                        pivot: {
                            rating: 3,
                        },
                    },
                ],
            },
        ]
        const pagination = {
            current_page: 1,
            last_page: 1,
        }
        const onChangePage = jest.fn()
        const onSearch = jest.fn()
        render(
            <Table
                items={items}
                pagination={pagination}
                onChangePage={onChangePage}
                onSearch={onSearch}
            />,
        )
        fireEvent.change(screen.getByLabelText('Type something to search'), {
            target: { value: 'Turbine' },
        })
        expect(onSearch).toHaveBeenCalledWith({ name: 'Turbine' })
    })
})
