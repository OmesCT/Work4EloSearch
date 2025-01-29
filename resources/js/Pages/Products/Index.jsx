import { useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Bar } from 'react-chartjs-2';
import { Chart as ChartJS, BarElement, CategoryScale, LinearScale } from 'chart.js';
ChartJS.register(BarElement, CategoryScale, LinearScale);


export default function Products({ products }) {
    const [viewMode, setViewMode] = useState('table'); // table | graph | card

    const graphData = {
        labels: products.map((product) => product.name),
        datasets: [
            {
                label: 'Stock',
                data: products.map((product) => product.stock),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
            },
            {
                label: 'Price',
                data: products.map((product) => product.price),
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
            },
        ],
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Products Table
                </h2>
            }
        >
            <Head title="Product" />
            <div className="container mx-auto mt-6">
                <h1 className="text-2xl font-bold mb-4 text-center">Product List</h1>

                {/* Selector for view mode */}
                <div className="flex justify-center mb-4 space-x-4">
                    <button
                        onClick={() => setViewMode('table')}
                        className={`px-4 py-2 border ${
                            viewMode === 'table' ? 'bg-blue-500 text-white' : 'bg-gray-100'
                        }`}
                    >
                        Table View
                    </button>
                    <button
                        onClick={() => setViewMode('graph')}
                        className={`px-4 py-2 border ${
                            viewMode === 'graph' ? 'bg-blue-500 text-white' : 'bg-gray-100'
                        }`}
                    >
                        Graph View
                    </button>
                    <button
                        onClick={() => setViewMode('card')}
                        className={`px-4 py-2 border ${
                            viewMode === 'card' ? 'bg-blue-500 text-white' : 'bg-gray-100'
                        }`}
                    >
                        Card View
                    </button>
                </div>

                {/* Render view based on selected mode */}
                {viewMode === 'table' && (
                    <table className="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr className="bg-green-100">
                                <th className="border border-gray-300 px-4 py-2">Name</th>
                                <th className="border border-gray-300 px-4 py-2">Description</th>
                                <th className="border border-gray-300 px-4 py-2">Price</th>
                                <th className="border border-gray-300 px-4 py-2">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            {products.map((product, index) => (
                                <tr key={index} className="text-center bg-yellow-50">
                                    <td className="border border-gray-300 px-4 py-2">{product.name}</td>
                                    <td className="border border-gray-300 px-4 py-2">{product.description}</td>
                                    <td className="border border-gray-300 px-4 py-2">{product.price}</td>
                                    <td className="border border-gray-300 px-4 py-2">{product.stock}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                )}

                {viewMode === 'graph' && (
                    <div className="my-6">
                        <Bar data={graphData} />
                    </div>
                )}

                {viewMode === 'card' && (
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        {products.map((product, index) => (
                            <div
                                key={index}
                                className="p-4 border rounded-lg shadow-sm bg-white"
                            >
                                <h2 className="text-lg font-bold">{product.name}</h2>
                                <p className="text-gray-600">{product.description}</p>
                                <p className="text-gray-800 font-semibold">Price: ${product.price}</p>
                                <p className="text-gray-800">Stock: {product.stock}</p>
                            </div>
                        ))}
                    </div>
                )}
            </div>
        </AuthenticatedLayout>
    );
}
