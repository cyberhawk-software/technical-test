import Head from 'next/head'
import Link from 'next/link'
import { useAuth } from '@/hooks/auth'
import Image from 'next/image'
import { useEffect } from 'react'
import { useRouter } from 'next/router'

export default function Home() {
    const router = useRouter()
    const { user } = useAuth({ middleware: 'guest' })

    useEffect(() => {
        if (user) router.push('/dashboard')
    }, [user])

    return (
        <>
            <Head>
                <title>Cyberhawk Test</title>
            </Head>

            <div className="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <div className="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    {user ? (
                        <Link
                            href="/dashboard"
                            className="ml-4 text-sm text-gray-700 underline">
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link
                                href="/login"
                                className="text-sm text-gray-700 underline">
                                Login
                            </Link>

                            <Link
                                href="/register"
                                className="ml-4 text-sm text-gray-700 underline">
                                Register
                            </Link>
                        </>
                    )}
                </div>

                <div className="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div className="flex justify-center pt-8 sm:justify-start sm:pt-0">
                        <Image
                            src="/cyberhawk.png"
                            alt="Cyberhawk logo"
                            width={500}
                            height={50}
                            className="object-contain"
                        />
                    </div>

                    <div className="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div className="grid grid-cols-1 md:grid-cols-2 join join-vertical md:join-horizonta">
                            <div className="p-6 join-item flex justify-center">
                                <Link
                                    href="/login"
                                    className="btn text-sm text-gray-400 w-32">
                                    Login
                                </Link>
                            </div>

                            <div className="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l join-item  flex justify-center">
                                <Link
                                    href="/register"
                                    className="btn text-sm text-gray-400 w-32">
                                    Register
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}
