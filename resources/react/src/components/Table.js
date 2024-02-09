import { useEffect, useState } from 'react'
import {
    ArrowLeftIcon,
    ArrowRightIcon,
    MagnifyingGlassIcon,
    EyeIcon,
    EyeSlashIcon,
} from '@heroicons/react/24/outline'
import {
    IconButton,
    Button,
    Card,
    Typography,
    Input,
    Select,
    Option,
    Collapse,
    CardBody,
    Rating,
    Chip,
} from '@material-tailwind/react'

const Table = ({ items, pagination, onChangePage, onSearch }) => {
    const [active, setActive] = useState(1)
    const [search, setSearch] = useState(undefined)
    const [option, setOption] = useState(undefined)
    const [edit, showEdit] = useState(undefined)

    const getItemProps = index => ({
        variant: active === index ? 'filled' : 'text',
        color: 'gray',
        onClick: () => setActive(index),
    })

    const next = () => {
        if (active === 5) return

        setActive(active + 1)
    }

    const prev = () => {
        if (active === 1) return

        setActive(active - 1)
    }

    const handleRating = rate => {
        const rateEnum = {
            1: 'Perfect',
            2: 'Has Something Wrong',
            3: 'Need Attention',
            4: 'Need To Be Fixed',
            5: 'Completely Broken',
        }
        return rateEnum[rate]
    }

    useEffect(() => {
        onChangePage && onChangePage({ page: active })
    }, [active])

    useEffect(() => {
        onSearch &&
            option &&
            search?.length > 3 &&
            onSearch({ [option]: search })
    }, [option, search])

    return (
        <Card className="h-full w-full bg-white overflow-hidden sm:rounded-lg border border-gray-200 shadow-md overflow-auto">
            <div className="w-full min-w-max table-auto text-left">
                <div className="flex flex-row justify-end">
                    <div className="py-5 pr-2">
                        <Select
                            label="Select an option"
                            onChange={value => setOption(value)}>
                            <Option value="name">Search by name</Option>
                            <Option value="component">
                                Search by component name
                            </Option>
                            <Option value="rate">Search by rate</Option>
                        </Select>
                    </div>
                    <div className="py-5 pr-5">
                        <Input
                            id="search"
                            label="Type something to search"
                            onChange={event => setSearch(event.target.value)}
                            icon={<MagnifyingGlassIcon />}
                            disabled={!option}
                        />
                    </div>
                </div>
                <div className="bg-gray-50 text-lg flex flex-row border-b border-t border-blue-gray-100">
                    <div className="basis-1/4 border-r border-blue-gray-100 bg-blue-gray-50 p-4"></div>
                    <div className="basis-1/4 border-r border-blue-gray-100 bg-blue-gray-50 p-4 text-center">
                        <Typography
                            variant="small"
                            color="blue-gray"
                            className="font-normal leading-none opacity-70">
                            Turbine
                        </Typography>
                    </div>
                    <div className="basis-1/4 border-r border-blue-gray-100 bg-blue-gray-50 p-4 text-center">
                        <Typography
                            variant="small"
                            color="blue-gray"
                            className="font-normal leading-none opacity-70">
                            Components
                        </Typography>
                    </div>
                    <div className="basis-1/4 border-blue-gray-100 bg-blue-gray-50 p-4 text-center">
                        <Typography
                            variant="small"
                            color="blue-gray"
                            className="font-normal leading-none opacity-70">
                            Action
                        </Typography>
                    </div>
                </div>
                <div className="divide-y divide-gray-100 border-t border-gray-100">
                    {items && items?.length ? (
                        items.map((item, index) => (
                            <>
                                <div
                                    key={index}
                                    className="hover:bg-gray-50 flex flex-row">
                                    <div className="px-6 py-4 basis-1/4">
                                        {item.id}
                                    </div>
                                    <div className="px-6 py-4 basis-1/4 text-center">
                                        {item.name}
                                    </div>
                                    <div className="px-6 py-4 basis-1/4 text-center">
                                        Qtd of components:{' '}
                                        {item.components.length}
                                    </div>
                                    <div className="px-6 py-4 basis-1/4 text-center">
                                        <div
                                            className="tooltip cursor-pointer"
                                            data-tip="Edit"
                                            onClick={() =>
                                                item.components.length > 0 &&
                                                showEdit(item.id)
                                            }>
                                            {edit === item.id ? (
                                                <EyeSlashIcon width={25} />
                                            ) : (
                                                <EyeIcon width={25} />
                                            )}
                                        </div>
                                    </div>
                                </div>
                                {edit === item.id &&
                                    item.components.length > 0 && (
                                        <div className="flex flex-row justify-center items-center">
                                            <Collapse open={true}>
                                                <Card className="my-4 mx-auto w-11/12">
                                                    <CardBody className="flex justify-between gap-2 overflow-auto">
                                                        {item.components.map(
                                                            component => (
                                                                <div className="flex items-center gap-2">
                                                                    <Rating
                                                                        value={
                                                                            component
                                                                                .pivot
                                                                                .rating
                                                                        }
                                                                    />
                                                                    <Typography>
                                                                        {
                                                                            component.name
                                                                        }
                                                                    </Typography>
                                                                    <Chip
                                                                        value={handleRating(
                                                                            component
                                                                                .pivot
                                                                                .rating,
                                                                        )}
                                                                    />
                                                                </div>
                                                            ),
                                                        )}
                                                    </CardBody>
                                                </Card>
                                            </Collapse>
                                        </div>
                                    )}
                            </>
                        ))
                    ) : (
                        <div className="flex justify-center align-center">
                            <Typography
                                variant="paragraph"
                                color="blue-gray"
                                className="font-normal leading-none opacity-70 w-full text-center">
                                No data has found
                            </Typography>
                        </div>
                    )}
                </div>
            </div>
            <div className="flex items-center gap-4 w-full justify-center py-6">
                <Button
                    variant="text"
                    className="flex items-center gap-2"
                    onClick={prev}
                    disabled={active === 1}>
                    <ArrowLeftIcon strokeWidth={2} className="h-4 w-4" />
                    Previous
                </Button>
                <div className="flex items-center gap-2">
                    {Array.from({ length: pagination?.last_page }).map(
                        (_, index) => (
                            <IconButton {...getItemProps(index + 1)}>
                                {index + 1}
                            </IconButton>
                        ),
                    )}
                </div>
                <Button
                    variant="text"
                    className="flex items-center gap-2"
                    onClick={next}
                    disabled={active === 5}>
                    Next
                    <ArrowRightIcon strokeWidth={2} className="h-4 w-4" />
                </Button>
            </div>
        </Card>
    )
}

export default Table
